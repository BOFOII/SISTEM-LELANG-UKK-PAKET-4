$(function () {
    let notifications = {},
        elNotif = $("#notification-list"),
        elCounter = $("#counter-notif"),
        counter = 0;

    getNotifications();

    function getNotifications() {
        axios
            .get("/notifications")
            .then(function (response) {
                response.data.data.map((value, key) => {
                    if (!notifications[value.id]) {
                        counter++;
                        notifications[value.id] = value;
                        setRow(value.message);
                    }
                });
            })
            .catch(function (error) {
                console.log(error);
            });
    }

    function setRow(message) {

        if (elCounter.length) {
            elCounter[0].innerText = counter;
        }

        let username = $('#label-username')[0].innerText;

        
        let rowOfNotif = `<a class="d-flex" href="#">
                            <div class="list-item d-flex align-items-start">
                                <div class="me-1">
                                    <div class="avatar"><img
                                            src="../../../app-assets/images/portrait/small/avatar-s-15.jpg"
                                            alt="avatar" width="32" height="32"></div>
                                </div>
                                <div class="list-item-body flex-grow-1">
                                    <p class="media-heading"><span class="fw-bolder">Hallo
                                            ${username} 🎉</span>!
                                    </p><small class="notification-text"> ${message}</small>
                                </div>
                            </div>
                        </a>`;

        if (elNotif.length) {
            elNotif.append(rowOfNotif);
        }
    }

    setInterval(getNotifications, 10000);
});
