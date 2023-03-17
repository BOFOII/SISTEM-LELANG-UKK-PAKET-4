Dropzone.autoDiscover = false;

$(function () {
  var mainForm = $('#main-form'),
    uploadedImageMap = {},
    image = $('input[name="image"]');

  let myDropzone = new Dropzone('#dpz-images', {
    paramName: 'file', // The name that will be used to transfer the file
    maxFiles: 1, // FILE
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
      let oldInput = mainForm.find(`input[name="image"]`)

      if(oldInput.length) {
        oldInput.remove();
      }

      let inputElement = document.createElement("input");
      inputElement.name = "image";
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
      mainForm.find(`input[name="image"][value="${value}"]`).remove();
    }

  });

  if (image.length) {
    $.each(image, function (index, el) {
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
