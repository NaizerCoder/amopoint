$(document).ready(function () {

    /*Получение типа устройства: мобильное устройство, планшет, ПК*/
    function getDevice(){
        const userAgent = navigator.userAgent.toLowerCase(); //получаем информацию отсюда
        let deviceType = '';

        /*парсим регулярным выражением*/
        if (/mobile|android|iphone|ipad|ipod|windows phone/.test(userAgent)) {
            deviceType = 'mobile';
        } else if (/tablet|ipad|playbook|silk/.test(userAgent)) {
            deviceType = 'tablet';
        } else {
            deviceType = 'pc';
        }
        return deviceType;
    }

    /*Получаем IP с помощью стороннего сервера, т.к. JavaScript не может напрямую получить IP-адрес пользователя*/
    $.getJSON('https://api.ipify.org?format=json', function (dataNetwork) {
        //console.log(dataNetwork);
        /*при успешном получении IP, получаем остальные данные согласно заданию*/
        $.getJSON(`https://ipapi.co/${dataNetwork.ip}/json`, function (dataGeo) {

            /*для удобства заносим полученную информацию в объект information*/
            let information = {
                ip: dataNetwork.ip,
                country: dataGeo.country_name,
                city: dataGeo.city,
                device: getDevice(),
            }
            //console.log(information);

            /*работаем*/
            $.post('script/handler.php', information,
                function(data) {
                    //console.log(JSON.parse(data));
                    //console.log(data);
                });
        });
    });

});