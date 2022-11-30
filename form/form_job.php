<div class="form-body">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <form id="vacancy_form" class="requires-validation" novalidate>

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
                            <select class="form-select mt-3 select form-control" name="vacancy" id="vacancy" onchange="changeFunction(value);">
                                <option value="Выберите вакансию" selected disabled>Выберите вакансию</option>
                                <option value="Системный администратор">Системный администратор</option>
                                <option value="Старший системный администратор">Старший системный администратор</option>
                                <option value="Разработчик ПО">Разработчик ПО</option>
                                <option value="Менеджер по продажам">Менеджер по продажам</option>
                            </select>
                        </div>

                        <div class="form-check form-group">
                            <input class="form-check-input" type="checkbox" name="chk" value="" id="invalidCheck" required>
                            <label class="form-check-label"> Я даю согласие на обработку <a href="/politica.php" target="_blank">персональных данных</a></label><br>
                            <div class="invalid-feedback">Подтвердите согласие на обработку персональных данных!</div>
                        </div>


                        <div class="form-button mt-3">
                            <button type="submit" id="btn_submit" class="submit btn btn-warning" name="save_btn" onclick="sendVacancyMsg()">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
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
    $(document).ready(function() {
        $(document).on('submit', '#vacancy_form', function() {
            return false;
        });
    });
</script>

