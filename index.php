<?php
session_start();
include("templates/header_main_page.php");
include("event.php");
$event = new Event();
$eventService = $event->getServices();
$eventAdvantages = $event->getAdvantages();
$eventClients = $event->getClients();
$eventReviews = $event->getReviews();
$eventEmployees = $event->getEmployees();
$eventVacancies = $event->getVacancies();
$eventPrivacyPolicy = $event->getPrivacyPolicy();
?>
                                        <!-- Modal-->
<div class="container" style="text-align: center;">
    <div class="modal-wide">
    <div class="modal fade getService" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" id="change_modal_size">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center"></h4>
                    <button type="button" data-bs-dismiss="modal" class="btn btn-default" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                </div>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>
    </div>
</div>

<div class="container" style="text-align: center; width: 30%">
    <div class="modal-wide">
        <div class="modal fade getService" id="myModalForm" role="dialog">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" id="change_modal_size">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-center"></h4>
                        <button type="button" data-bs-dismiss="modal" class="btn btn-default" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                    </div>
                    <div class="modal-body"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="modal-wide">
        <div class="modal fade getService" id="Modal_vacancy" role="dialog">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" style="min-width:30%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-center"></h4>
                        <button type="button" data-bs-dismiss="modal" class="btn btn-default" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                    </div>
                    <div class="modal-body"></div>
                </div>
            </div>
        </div>
    </div>
</div>
                                            <!-- Service_modal -->
        <div class="container">
            <div class="modal-wide">
            <div class="modal fade getService" id="myModal2" role="dialog">
                <div class="modal-dialog modal-lg modal-dialog-scrollable" style="min-width:50%">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-center"></h4>
                            <button type="button" data-bs-dismiss="modal" class="btn btn-default" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer border-0 d-flex justify-content-start">
                            <button type="submit" id="changeSelected" class="form-control-static pull-left btn btn-sm btn-outline-secondary history-event btn-success openBtn" style="padding: 7px 7px" onclick="loadFormForService('/form/form_service.php', 'Заполните форму')">Отправить заявку</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

                                           <!-- Form Modal -->
            <div class="container">
                <div class="modal-wide">
                <div class="modal fade" id="myModal1" role="dialog">
                    <div class="modal-dialog modal-lg" style="min-width:30%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title text-center">Заполните форму</h4>
                                <button type="button" data-bs-dismiss="modal" class="btn btn-default" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                            </div>
                            <div class="modal-body">
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
                                                 <!-- Main page -->
        <section id="hero" class="d-flex align-items-center">
            <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h1>IT-АУТСОРСИНГ</h1>
                <h3>Развивайте <b>Ваш</b> бизнес, <br> о компьютерах позаботимся мы</h3>
                <div class="d-flex">
                    <button type="button" class="btn btn-success openBtn0 btn-get-started scrollto" data-toggle="modal" data-target="myModal1" onclick="loadForm('/form/form_service.php', 'Заполните форму', 'IT-аутсорсинг')">Оставить заявку</button>
                </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                <img src="img/hero-img.png" class="img-fluid animated" alt="">
                </div>
            </div>
            </div>
        </section>

                                            <!-- Free audit -->
<div id="logowrap">
        <div style="margin: 0 10px 14px 14px;" class="pb-widget-button pb-widget-button_round pb-widget-button_round-lb">
        <a id="pb-widget-show" class="pb-widget-button__inner" onclick="loadForm('/form/form_service.php', 'Заполните форму', 'Бесплатный аудит')">
           <span class="pb-widget-button__text-block">
                <span class="pb-widget-button__text">Аудит бесплатно</span>
           </span>
        </a>
    </div>

                                                 <!-- Cookie banner -->
            <div id="cookieNotice" class="light display-right fixed-bottom cookie">
                <div id="closeIcon"></div>
                <?php
                if(!empty($eventPrivacyPolicy) && count($eventPrivacyPolicy)>0) { ?>
                <?php foreach($eventPrivacyPolicy as $key=>$element) { ?>
                <div class="content-wrap">
                    <div class="row">
                        <div id="cookie_button" class="col-1 col-lg-1 col-md-1 col-xs-1">
                            <button id="rotate_x" type="button" class="btn btn-default" onclick="acceptCookieConsent_button();">
                                <span aria-hidden="true">&times;</span>
                        </div>
                        <div id="mobile_cookie_banner" class="col-11 col-lg-11 col-md-11 col-xs-11"><p>Мы используем файлы cookie. Продолжив работу с сайтом, вы соглашаетесь с <a onclick="loadPrivacyPolicy(<?php print $element['id']; ?>, '<?php print $element['header']; ?>')">Политикой обработки персональных данных</a></p></div>
                </div></div>
                    <?php } ?>
                <?php } ?>
            </div>
</div>
                                             <!-- Services -->
        <section id="services" class="text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12 section-intro text-center" data-aos="fade-up">
                        <div class="section-title"><h2>УСЛУГИ</h2>
                        <div class="divider"></div></div>
                    </div>
                </div>
                <div class="row g-4">
                <?php if(!empty($eventService) && count($eventService)>0) { ?>
            <?php foreach($eventService as $key=>$element) {
                ?>
                    <div data-id="<?php echo $element['id'] ?>" class="col-md-4 view_data" data-aos="zoom-in" onclick="loadDoc(<?php print $element['id']; ?>, '<?php print $element['header']; ?>')">
                        <div class="change">
                            <div class="service-img">
                                <?php print $element['image']; ?>
                            </div>
                            <h5 class="mt-5 pt-4"><?php print $element['header']; ?></h5>
                            <p> <?php print $element['main']; ?></p>
                            <div id="includedContent">
                                <button type="submit" class="btn btn-sm btn-outline-secondary history-event btn-success openBtn"  data-ueventid="<?php print $element['id'];?>" onclick="loadDoc(<?php print $element['id']; ?>, '<?php print $element['header']; ?>')"><u>Краткое описание</u></button>
                            </div>
                            </div>
                        </div>
                     <?php }} ?>
                </div>
            </div>
        </section>
<!-- Advantages -->
<section id="features" class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-12 section-intro text-center" data-aos="fade-up">
                <div class="section-title"><h2>ПРЕИМУЩЕСТВА</h2>
                    <div class="divider"></div></div>
            </div>
        </div>
        <div class="d-flex justify-content-center row gx-4 gy-5">
            <?php if(!empty($eventAdvantages) && count($eventAdvantages)>0) { ?>
                <?php foreach($eventAdvantages as $key=>$element) { ?>
                    <div class="col-md-4 feature view_adv" data-aos="fade-up" onclick="loadAdvantages(<?php print $element['id']; ?>, '<?php print $element['header']; ?>')">
                        <div class="icon"><?php print $element['image']; ?></div>
                        <h5 class="mt-4 mb-3"><?php print $element['header']; ?></h5>
                        <p><?php print $element['main']; ?></p>
                        <div id="includedContent_advantages">
                            <button type="submit" class="btn btn-sm btn-outline-secondary history-event btn-success openBtn"  data-ueventid="<?php print $element['id'];?>" onclick="loadAdvantages(<?php print $element['id']; ?>, '<?php print $element['header']; ?>')"><u>Краткое описание</u></button>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>

                                                <!--Counters-->
        <section id="counts" class="counts bg-cover">
            <div class="container">
            <div class="container text-white text-center">
                <div class="row gy-4" data-aos="fade-up">
                    <div class="row counters">
                        <div class="col-md-3">
                        <i class="icon-trophy h1"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter" style="display:inline;"></span>
                            <span style="display:inline;">&nbspлет +</span>
                        </div>
                        <h5>Работаем с 2007 года</h5>
                    </div>

                    <div class="col-md-3">
                        <i class="icon-desktop h1"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="1200" data-purecounter-duration="1" class="purecounter" style="display:inline;"></span>
                            <span style="display:inline;">+</span>
                        </div>
                        <h5>ПК на обслуживании</h5>
                    </div>

                    <div class="col-md-3">
                        <i class="icon-happy h1"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="500" data-purecounter-duration="1" class="purecounter" style="display:inline;"></span>
                            <span style="display:inline;">+</span>
                        </div>
                        <h5>Довольных клиентов</h5>
                    </div>


                    <div class="col-md-3">
                        <i class="icon-profile-female h1"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="25" data-purecounter-duration="1" class="purecounter" style="display:inline;"></span>
                            <span style="display:inline;">+</span>
                        </div>
                        <h5>Человек в команде</h5>
                    </div>
                </div>
            </div>
        </section>
                                                 <!-- Reviews -->
<section id="review" style="background-color: #ededed !important" class="text-center">
    <div class="container">
        <div class="row row-eq-height">
            <div class="col-12 section-intro text-center" data-aos="fade-up">
                <div class="section-title"><h2>ОТЗЫВЫ</h2>
                    <div class="divider"></div></div>
            </div>

            <div class="slide-container swiper">
                <div class="slide-content">
                    <div class="card-wrapper swiper-wrapper">
                        <?php if(!empty($eventReviews) && count($eventReviews)>0) { ?>
                            <?php shuffle($eventReviews);?>
                            <?php foreach($eventReviews as $key=>$element) { ?>
                                <div class="card swiper-slide text-center" data-aos="fade-up" data-hash="<?php $element['company_name']?>">
                                    <div class="image-content h-100 d-flex">
                                        <div class="card-content">
                                            <p class="description"><?php print $element['text']; ?></p>
                                            <h5 class="name"><?php print $element['name']; ?><h5><?php print $element['company_name']; ?></h5></h5>
                                            <div class="thumb-content">
                                                <?php print $element['image']; ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>

                <div class="swiper-button-next swiper-navBtn"></div>
                <div class="swiper-button-prev swiper-navBtn"></div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- Clients -->
            <section id="clients" class="carousel_se_01">
                <div class="container pt-5">
                    <div class="row">
                            <div class="col-12 section-intro text-center" data-aos="fade-up">
                                <div class="section-title"><h2>КЛИЕНТЫ</h2>
                                <div class="divider"></div></div>
                            </div>
                            <div class="owl-carousel carousel_se_01_carousel owl-theme" data-aos="fade-up">

                            <?php if(!empty($eventClients) && count($eventClients)>0) { ?>
                                <?php shuffle($eventClients);?>
                        <?php foreach($eventClients as $key=>$element) { ?>
                                <div class="item clients" data-aos="fade-up">
                                    <div class="col-md-12 wow fadeInUp ">
                                        <div class="main_services text-center">
                                             <a href="<?php print $element['link']; ?>" target="_blank">
                                                <?php print $element['image']; ?>
                                             </a>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                        <?php } ?>
                            </div>
                    </div>
                </div>
            </section>

                                                 <!-- About us -->
                <section id="about" class="carousel_se_02">
                    <div class="container pt-5">
                        <div class="row">
                                <div class="col-12 section-intro text-center" data-aos="fade-up">
                                    <div class="section-title"><h2>О нас</h2><div class="divider"></div>
                                    <div id="text_about_us">Компания КОПИКОН более 15 лет на ИТ-рынке УР и ПФО.<br>
                                Опыт и собственные разработки позволяют оказывать качественные услуги с минимальными затратами.<br>
                                Стабильность, надёжность и оперативность решения любых вопросов заказчика - залог долгосрочных партнерских отношений.</div>                                    </div>
                                </div>
<!--                                <div class="owl-carousel carousel_se_02_carousel owl-theme" data-aos="fade-up">-->

                                <?php /*if(!empty($eventEmployees) && count($eventEmployees)>0) { ?>
                                    <?php shuffle($eventEmployees);?>
                        <?php foreach($eventEmployees as $key=>$element) { ?>
                                    <div class="item employee" id="employee" data-aos="fade-up">
                                        <div class="col-md-12 wow fadeInUp ">
                                            <div class="main_services text-center" onclick='sendVacancyBlock("Попасть в команду", "Выберите вакансию", "<?php print $element['job']; ?>")'>
                                            <?php print $element['image']; ?>
                                                <p class="img__description"><?php print $element['name']; ?><br><?php print $element['job']; ?>
                                                </p>
                                            </div>
                                            <div class="about_us_text">
                                                <h5><?php print $element['name']; ?><br><?php print $element['job']; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                        <?php } */?>
<!--                                </div>-->
                        </div>
                    </div>
                </section>

                                                    <!--Vacancies-->

<section id="vacancies" class="text-center">
    <div class="container">
        <div class="row row-eq-height">
            <div class="col-12 section-intro text-center" data-aos="fade-up">
                <div class="section-title">
                    <h2>Вакансии</h2>
                    <div class="divider"></div>
                </div>
            </div>
        <div class="slide-container swiper">
            <div class="slide-content_2">
                <div class="card-wrapper swiper-wrapper">
                    <?php if(!empty($eventVacancies) && count($eventVacancies)>0) { ?>
                        <?php foreach($eventVacancies as $key=>$element) { ?>
                            <div class="card swiper-slide col-md-4  text-center" data-aos="fade-up" onclick='sendVacancy("Попасть в команду", "<?php print $element['name_vacancy']; ?>")'>
                                <div class="card-header w-100"><h5><?php print $element['name_vacancy']; ?></h5></div>
                                <div class="image-content h-100 d-flex">
                                    <div class="card-content">
                                        <div class="thumb-content">
                                            <?php print $element['vacancy']; ?>
                                        </div>
                                        <div class="join_team"><p>Хочу в команду</p></div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>

            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
        </div>
        <div class="swiper-pagination1"></div>
    </div>
</section>

                                                 <!-- Our contacts -->
        <section id="contact" class="contact">
            <div class="container">
            <div class="section-title"><h2>КОНТАКТЫ</h2></div>
            <div class="row">
                <div class="col-lg-5 d-flex align-items-stretch">
                    <div class="info">

                        <div><i class="bi bi-geo-alt"></i>
                        <h4><span><a href="https://yandex.ru/maps/org/kopikon/74185810854/?ll=53.224596%2C56.840852&z=17" target="_blank"> г. Ижевск, ул. Удмуртская, 195</a></span></h4>
                        </div>
                        <div>
                        <i class="bi bi-envelope"></i>
                            <h4><a href="mailto:info@copycon.ru"> info@copycon.ru</a></h4></div>

                        <i class="bi bi-phone"></i>
                        <h4><a href="tel:+73412918005">+7 (3412) 918 005</a></h4>
                        <i class="fab fa-whatsapp"></i><h4><a href="https://api.whatsapp.com/send?phone=79124621700" target="_blank">+7 (912) 462 1700</a></h4>
                        <i class="fa fa-paper-plane"></i><h4><a href="https://t.me/CopyconChatBot" target="_blank" rel="noopener">+7 (912) 462 1700</a></h4>
                        <i class="fab fa-vk"></i><h4><a href="https://vk.com/im?sel=-27639668" target="_blank" rel="noopener">Вконтакте</a></h4>
                        <i class='fab fa-viber'></i><h4><a href="viber://pa?chatURI=copycon_bot" target="_blank" rel="noopener">Viber</a></h4>
                </div>
                </div>

                <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                <form role="form" class="map">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div id="map" style="width: 100%; height: 290px;">
                                <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Abb48c85f3a3169ff42c06f5e51e394dd4ea8ead0d8c48baf6338f32fc874abe4&amp;height=290&amp;lang=ru_RU&amp;scroll=true"></script>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
<?php include("templates/footer.php"); ?>
