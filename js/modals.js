let title_for_service = {};
let vacancy_name = {};
let service = {};
let data = {};
function loadForm(url, title, service) {
    service.value = service;
	$.ajax({
		type: 'POST',
        url: url,
		dataType: 'html',
		success: function(response) {
                $('#myModal1').modal('show');
                $('.modal-body').html(response);
                $('.modal-title').html(title);
                $('#myModal1').find('#theme').val(service);
                if(service == "IT-аутсорсинг") {
                    $(".btn-warning1").show();
                }
    }     }); 
}

function sendVacancy(title, vacancy_name) {
    vacancy_name.value = vacancy_name;
    $.ajax({
        type: 'POST',
        url: "/form/form_job.php",
        data: {new_val:vacancy_name.value},
        dataType: 'html',
        success: function(data) {
                $('#Modal_vacancy').modal('show');
                $('.modal-body').html(data);
                $('.modal-title').html(title);
                $('#Modal_vacancy').find('#vacancy').val(vacancy_name);
        }     });
}

function loadFormForService(url, title) { 	
    $.ajax({ 		
        type: 'POST', 		
        url: url, 		
        data: {new_value:title_for_service.value},
        dataType: 'html', 		
        success: function(data) {
            $('#myModal2').modal('hide');
            $('#myModal1').modal('show');
            $('.modal-body').html(data);
            $('.modal-title').html(title);
            $('#myModal1').find('#theme').val(title_for_service.value);
            changeFunc(title_for_service.value);
        } 	}); }

function loadDoc(info_service, title_serv) {
    let val = info_service;
    title_for_service.value = title_serv;

	$.ajax({
		type: 'POST',
        url: "/upload.php",
        data: {val:val},
		dataType: 'html',
		success: function(data) {
                $('.modal-body').html(data);
                $('.modal-title').html(title_serv);
                $('#myModal2').modal('show');
    }     }); 
}

function loadParam() {
    let price_1 = $('#costDiv').html();
    let computers = $('#pcCount').val();
    let serverCount = $('#serverCount').val();
    let workTime = $('#workTime').val();
    let typeProgramm = $('#typeProgramm').val();
        $.ajax({
        type: "POST",
        url: '../calc/getParameters.php',
        data: {'parameters': price_1 + "\nКол-во компьютеров: " + computers + ". \nКол-во серверов: " + serverCount
    + ". \nВариант обслуживания: " + workTime + ". \nТариф: " + typeProgramm},
        success: function(data)
        {
            document.getElementById("costDiv").style.color = "green";
            console.log(data);
        }
    });
}

function loadHistory(info_calc) {
    let val = info_calc;
    $.ajax({
		type: 'POST',
        url: "../calc_links/history.php",
        data: {val:val},
		dataType: 'html',
		success: function(data) {
                $('.modal-body').html(data);
                $('#myModal').modal('show');
    }     }); 
}



function loadAdvantages(info_adv, title) {
    let adv = info_adv;
    $.ajax({
		type: 'POST',
        url: "/upload_advantages_modal.php",
        data: {adv:adv},
		success: function(data) {
                $('.modal-footer').modal('hide');
                $('.modal-body').html(data);
                $('.modal-title').html(title);
                $('#myModal').modal('show');
    }     }); 
}


function loadPrivacyPolicy(info_pp, title) {
    let pp = info_pp;
    $.ajax({
		type: 'POST',
        url: "/politica_modal.php",
        data: {pp:pp},
		success: function(data) {
                $('.modal-body').html(data);
                $('.modal-title').html(title);
               $('#myModal').modal('show');
    }     }); 
}


function add_new_link() {
    let today = new Date();

    let date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();

    let time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();

    let dateTime = date+' '+time;
    let comment = "";
    let dt = new Date().getTime();
    let uuid = 'xxxxxxxxxxxx4xxx'.replace(/[xy]/g, function(c) {
        var r = (dt + Math.random()*16)%16 | 0;
        dt = Math.floor(dt/16);
        return (c=='x' ? r :(r&0x3|0x8)).toString(8);
    });
    let status = "Опубликовано";
        $.ajax({
        type: "POST",
        url: '../calc_links/add_link.php',
        data: {dateTime:dateTime, comment:comment, uuid:uuid, status:status},
        success: function(data)
        {
            console.log(data);
            alert("Добавлена новая ссылка");
            setTimeout("location.reload(true);", 10);
        }
    });
}

let name_1;
let email;
let number;
let i1;
let job;
let message;
function getName(value) {
    name_1 = value;
}
function getEmail(value) {
    email = value;
}
function getNumber(value) {
    number = value;
}
function changeFunc(i) {
    i1 = i;
    if (i1 == 'IT-аутсорсинг') {
        $(".btn-warning1").show();
    }
    if (i1 !== 'IT-аутсорсинг') {
        $(".btn-warning1").hide();
    }
}

function changeFunction(job_vacancy) {
    job = job_vacancy;
}

function getMessage(value) {
    message = value;
}

function calc() {
    let GUID = function () {};
    GUID.NewGuid = function () {};

    GUID.NewGuid.prototype.toString = function () {
        let guid = 'xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
            let r = Math.random() * 16 | 0, v = c === 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16);
        });
        return guid;
    };
    let guid = new GUID.NewGuid;
    if (typeof  name_1 !== 'undefined') {
        name_1 = name_1.trim();
    }
    if (typeof  email !== 'undefined') {
        email = email.trim();
    }
    if (typeof  number !== 'undefined') {
        number = number.trim();
    }
    if($('input[name="chk"]:checked').length > 0) {
        if (((/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) || (/(?:\+|\d)[\d\-\(\) ]{10,}\d/g.test(number))) && (typeof email !== 'undefined') || (typeof number !== 'undefined')) {
            $.ajax({
                url: '../calc/changeCode.php',
                method: "post",
                data: {name_calc: name_1, email_calc: email, number_calc: number},
                success: function (data) {
                    if(data != "") {
                        location.href = "/calc/?" + data;
                    }else {
                        location.href = "/calc/?" + guid.toString();
                    }
                }
            });
        } else {
            $(".feedback").show();
            document.getElementById("feedback").display = "block"
        }
    }
}

function sendForm() {
    let reason = document.getElementById('theme').value;
    if (typeof  name_1 !== 'undefined') {
        name_1 = name_1.trim();
    }
    if (typeof  email !== 'undefined') {
        email = email.trim();
    }
    if (typeof  number !== 'undefined') {
        number = number.trim();
    }
    if($('input[name="chk"]:checked').length > 0) {
        if (((/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) || (/(?:\+|\d)[\d\-\(\) ]{10,}\d/g.test(number))) && (typeof email !== 'undefined') || (typeof number !== 'undefined')) {
            $.ajax({
                url: '../form/send_form.php',
                method: "post",
                data: {name: name_1, email: email, number: number, theme: i1, message: message},
                success: function (data) {
                    console.log(data);
                    $('#myModal1').modal('hide');
                    $('.modal-body').html('Сообщение было отправлено');
                    $('.modal-title').html("Успех");
                    $('#myModalForm').modal('show');
                },
                error: function (jqXHR, exception) {
                    let msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Проверьте соединение с сетью.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Страница не найдена. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Внутренняя ошибка сервера [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Запрошенный JSON не выполнен.';
                    } else if (exception === 'timeout') {
                        msg = 'Ошибка тайм-аута.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax-запрос прерван.';
                    } else {
                        msg = 'Неперехваченная ошибка.\n' + jqXHR.responseText;
                    }
                    $('#myModal1').modal('hide');
                    $('.modal-body').html("Сообщение не отправлено. Ошибка: " + msg);
                    $('.modal-title').html("");
                    $('#myModalForm').modal('show');
                },
            });
        }
    }
}

function sendVacancyMsg() {
    let vacancy = document.getElementById('vacancy').value;
    let vacancy1 = $('#vacancy').val();
    if (typeof  name_1 !== 'undefined') {
        name_1 = name_1.trim();
    }
    if (typeof  email !== 'undefined') {
        email = email.trim();
    }
    if (typeof  number !== 'undefined') {
        number = number.trim();
    }
    if($('input[name="chk"]:checked').length > 0) {
        if (((/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) || (/(?:\+|\d)[\d\-\(\) ]{10,}\d/g.test(number))) && (typeof email !== 'undefined') || (typeof number !== 'undefined')) {
            $.ajax({
                url: '../form/send_form.php',
                method: "post",
                data: {name: name_1, email: email, number: number, vacancy: job},
                success: function (data) {
                    $('#Modal_vacancy').modal('hide');
                    $('.modal-body').html('Сообщение было отправлено');
                    $('.modal-title').html("Успех");
                    $('#myModalForm').modal('show');
                },
                error: function (jqXHR, exception) {
                    let msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Проверьте соединение с сетью.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Страница не найдена. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Внутренняя ошибка сервера [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Запрошенный JSON не выполнен.';
                    } else if (exception === 'timeout') {
                        msg = 'Ошибка тайм-аута.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax-запрос прерван.';
                    } else {
                        msg = 'Неперехваченная ошибка.\n' + jqXHR.responseText;
                    }
                    $('#Modal_vacancy').modal('hide');
                    $('.modal-body').html("Сообщение не отправлено. Ошибка: " + msg);
                    $('.modal-title').html("");
                    $('#myModalForm').modal('show');
                },
            });
        }
    }
}