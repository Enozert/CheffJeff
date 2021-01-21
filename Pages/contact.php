<?php
    $Page = "Contact";
    $JS = "contact";
    $CSS = $JS;
    if(!isset($root) || is_null($root)){
        include('../config.php');
    }
    include($root."/src/php/api/contact.api.php");
    include($root."/pages/templates/top.php");
?>
<section class="contact">
    <div class="HomeBackgroud">
        <img src="<?=$img1?>" alt="home background">
    </div>
    <div class="inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1><?=$txt1?></h1>
                    </div>
                </div>
            </div>
        </div>
        <?php
            if(isset($_GET['message'])){
                $error = $_GET['message'];
                echo "
                <div class='container pt-4 mt-5 pb-4 mb-5'>
                    <div class='row'>
                        <div class='col-md-12'>
                            <div class='innerError text-center'>
                                <p>$error</p>
                            </div>
                        </div>
                    </div>
                </div>";
            }
        ?>
        <div class="container">
            <div class="form-wrapper">
            <!-- /Recources/PHP/contactSubmit.php  -->
                <form id="form" class="contactForm" action="/src/php/formSubmit.php" method="post" @submit="onSubmit">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="inner">
                                <div class="wrap" :class="{error: fNameHasError, valid: fNameIsValid}">
                                    <label for="firstName">
                                        <span class="labelText"><?=$lbl1?></span>
                                    </label>
                                    <input 
                                        type="text" 
                                        name="firstName" 
                                        id="firstName" 
                                        class="input firstName" 
                                        @keyup="checkFName(fName)" 
                                        @blur="checkFName(fName)"
                                        v-model="fName"
                                    >
                                    <span class="help-block">
                                        {{ errors['fName'] }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="inner">
                                <div class="wrap" :class="{error: lNameHasError, valid: lNameIsValid}">
                                    <label for="text">
                                        <span class="labelText"><?=$lbl2?></span>
                                    </label>
                                    <input 
                                        type="text" 
                                        name="lastName" 
                                        id="lastName" 
                                        class="input lastName"
                                        @keyup="checkLName(lName)" 
                                        @blur="checkLName(lName)"
                                        v-model="lName"
                                    >
                                    <span class="help-block">
                                        {{ errors['lName'] }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="inner">
                                <div class="wrap" :class="{error: emailHasError, valid: emailIsValid}">
                                    <label for="email">
                                        <span class="labelText"><?=$lbl3?></span>
                                    </label>
                                    <input 
                                        type="email" 
                                        name="email" 
                                        id="mail" 
                                        class="input mail"
                                        @keyup="checkEmail(email)" 
                                        @blur="checkEmail(email)"
                                        v-model="email"
                                    >
                                    <span class="help-block">
                                        {{ errors['email'] }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="inner">
                                <div class="wrap" :class="{error: phoneHasError, valid: phoneIsValid}">
                                    <label for="tel">
                                        <span class="labelText"><?=$lbl4?></span>
                                    </label>
                                    <input 
                                        type="tel" 
                                        name="tel" 
                                        id="tel" 
                                        class="input tel"
                                        @keyup="checkPhone(phone)"
                                        @blur="checkPhone(phone)" 
                                        v-model="phone"
                                    >
                                    <span class="help-block">
                                        {{ errors['phone'] }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="inner">
                                <div class="wrap" :class="{error: messageHasError, valid: messageIsValid}">
                                    <label for="message">
                                        <span class="labelText lower"><?=$lbl5?></span>
                                    </label>
                                    <textarea 
                                        name="message" 
                                        id="message" 
                                        name="message" 
                                        class="input message"
                                        @keyup="checkMessage(message)" 
                                        @blur="checkMessage(message)"
                                        v-model="message"
                                    ></textarea>
                                    <span class="help-block">
                                        {{ errors['message'] }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="recaptcha" data-theme="dark" class="g-recaptcha data-theme" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
                            <span class="help-block">
                                {{ errors['recapcha'] }}
                            </span>
                        </div>
                        <div class="col-md-6">
                            <div class="inner">
                                <button type="submit" name="submit" id="submit" class="submit"><span><?=$btn?></span></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php 
    include($root."/Pages/Templates/bottom.php")
?>