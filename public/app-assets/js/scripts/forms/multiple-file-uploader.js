Dropzone.autoDiscover = false;

$(function () {

  var mainForm = $('#main-form'),
    uploadedImageMap = {},
    images = $('input[name="images[]"]');

  let myDropzone = new Dropzone('#dpz-images', {
    paramName: 'file', // The name that will be used to transfer the file
    maxFiles: 3, // FILE
    maxFilesize: 3, // MB
    acceptedFiles: ".jpeg,.jpg,.png",
    addRemoveLinks: true,
    dictRemoveFile: 'Click To Remove',

    init: function () {
      var _this = this;
      $('#clear-dropzone').on('click', function () {
        _this.removeAllFiles();
      });
    },

    success: function (file, response) {
      let inputElement = document.createElement("input");
      inputElement.name = "images[]";
      inputElement.className = "d-none";
      inputElement.type = "text";
      inputElement.setAttribute("value", `${response.url}`);
      mainForm.append(inputElement);

      uploadedImageMap[file.name] = response.url;
    },

    removedfile: function (file) {
      file.previewElement.remove();

      if (typeof file.name === 'undefined') {
        return;
      }

      var name = file.name;

      if (uploadedImageMap[name] === 'undefined') {
        return;
      }

      let value = uploadedImageMap[name];
      mainForm.find(`input[name="images[]"][value="${value}"]`).remove();
    }
  });

  if (images.length > 0) {
    $.each(images, function (index, el) {
      var url = el.value;
      var namefile = url.split("/").pop();

      var mockFile = {
        name: namefile,
        size: 0,
      };

      myDropzone.emit("addedfile", mockFile);
      myDropzone.emit("thumbnail", mockFile, url);
      myDropzone.emit("complete", mockFile);
      uploadedImageMap[namefile] = url;
    });
  }
})
