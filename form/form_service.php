<div class="form-body">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <form id="form" class="requires-validation" novalidate>

                        <div class="col-md-12 form-group">
                            <input class="form-control" pattern="^[а-яА-ЯёЁa-zA-Z\s]+$" type="text" id="name" name="name" placeholder="Ваше имя" onchange='getName(this.value)'>
                            <div class="invalid-feedback">Проверьте корректность введенных данных!</div>
                        </div>

                        <div class="col-md-12 form-group">
                            <input class="form-control" pattern="[^@]+@[^@]+\.[^@]+" type="email" id="email" name="email" placeholder="Email" onchange='getEmail(this.value)' required>
                            <div class="invalid-feedback">Заполните данное поле!</div>
                        </div>

                        <div class="col-md-12 form-group">
                            <input class="form-control" type="number" id="phone" name="number" placeholder="Номер телефона" onchange='getNumber(this.value)' required>
                            <div class="invalid-feedback">Заполните данное поле!</div>
                        </div>

                        <div class="col-md-12 form-group">
                            <select class="form-select mt-3 select form-control" name="theme" id="theme" onchange="changeFunc(value);">
                                <option value="" selected disabled>Выберите услугу</option>
                                <option value="Бесплатный аудит">Бесплатный аудит</option>
                                <option value="IT-консалтинг">IT-консалтинг</option>
                                <option value="IT-аутсорсинг">IT-аутсорсинг</option>
                                <option value="Инженерная инфраструктура">Инженерная инфраструктура</option>
                                <option value="IT-инфраструктура">IT-инфраструктура</option>
                                <option value="Закупка и ремонт техники">Закупка и ремонт техники</option>
                                <option value="Программное обеспечение">Программное обеспечение</option>
                            </select>
                        </div>

                        <div class="col-md-12 form-group">
                            <textarea type="text" id="text_comment" class="form-control" name="message" rows="3" placeholder="Введите сообщение" onchange='getMessage(this.value)'></textarea>
                        </div>

                        <div class="form-check form-group">
                            <input class="form-check-input" type="checkbox" value="" name="chk" id="invalidCheck" required>
                            <label class="form-check-label"> Я даю согласие на обработку <a href="/politica.php" target="_blank">персональных данных</a></label><br>
                            <div class="invalid-feedback">Подтвердите согласие на обработку персональных данных!</div>
                        </div>


                        <div class="form-button mt-3">
                            <button type="submit" id="btn_submit2" class="submit btn btn-warning" name="save_btn" onclick="sendForm()">Отправить</button>
                            <button type="submit" id="btn_calc" class="btn btn-warning1" onclick="calc()">Калькулятор</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(".btn-warning1").hide();
    (function () {
        'use strict'
        const forms = document.querySelectorAll('.requires-validation')
        Array.from(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
    let form = document.getElementById("form");
    function handleForm(event) { event.preventDefault(); }
    form.addEventListener('submit', handleForm);
    $(document).ready(function() {
        $(document).on('submit', '#form', function() {
            return false;
        });
    });
</script>
