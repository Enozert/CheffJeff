import '../main';
import Vue from '../../../node_modules/vue/dist/vue.common.prod';
let inputFocus;

$(document).ready(function() {
  $('form .inner').click(function() {
    $(this).addClass('active');
  });
  $('form input').focusout(function(){
    inputFocus = $(this);
    focusoutInput();
  });
  $('form input').focusin(function(){
    inputFocus = $(this);
    focusinInput();
  });
  $('form textarea').focusout(function(){
    inputFocus = $(this);
    focusoutInput();
  });
  $('form textarea').focusin(function(){
    inputFocus = $(this);
    focusinInput();
  });
});

function focusinInput() {
  if(!inputFocus.parent('.wrap').parent('.inner').hasClass('active')){
    inputFocus.parent('.wrap').parent('.inner').addClass('active');
  }
  inputFocus = "";
}

function focusoutInput() {
  if(inputFocus.val() == ""){
    if(inputFocus.parent('.wrap').parent('.inner').hasClass('active')){
      inputFocus.parent('.wrap').parent('.inner').removeClass('active');
    }
  }
  inputFocus = "";
}

new Vue({
  el: '#form',
  data: {
    errors: {
      'fName': null,
      'lName': null,
      'email': null,
      'phone': null,
      'message': null,
      'recapcha': null,
    },
    fName: null,
    validFName: false,
    fNameHasError: false,
    fNameIsValid: false,
    lName: null,
    validLName: false,
    lNameHasError: false,
    lNameIsValid: false,
    email: null,
    validEmail: false,
    emailHasError: false,
    emailIsValid: false,
    phone: null,
    validPhone: false,
    phoneHasError: false,
    phoneIsValid: false,
    message: null,
    validMessage: false,
    messageHasError: false,
    messageIsValid: false,
    validRecaptcha: false,
    lang: localStorage.getItem('lang'),
  },
  methods: {
    onSubmit: function(e) {
      if(!this.validFName){
        this.checkFName(String(this.fName));
      }
      if(!this.validLName){
        this.checkLName(String(this.lName));
      }
      if(!this.validEmail){
        this.checkEmail(String(this.email));
      }
      if(!this.validPhone){
        this.checkPhone(String(this.phone));
      }
      if(!this.validMessage){
        this.checkMessage(String(this.message));
      }
      if(grecaptcha.getResponse().length !== 0){
        this.errors['recapcha'] = null;
        this.validRecaptcha = true;
      }else{
        if(this.lang == 'NL'){
          this.errors['recapcha'] = 'Toon aan dat je geen robot bent.';
        }else{
          this.errors['recapcha'] = 'Please verify that you are not a robot.';
        }
        this.validRecaptcha = false;
      }

      if(!this.validFName || !this.validLName || !this.validEmail 
        || !this.validPhone || !this.validMessage || !this.validRecaptcha){
          e.preventDefault();
      }
    },
    checkFName: function(fName) {
      if(fName == null || fName == '' || fName == 'null'){
        if(this.lang == 'NL'){
          this.errors['fName'] = 'Voornaam kan niet leeg zijn.';
        }else{
          this.errors['fName'] = 'First name can not be empty.';
        }
        this.validFName = false;
        this.fNameIsValid = false;
        this.fNameHasError = true;
      }else if(!this.validateName(fName)){
        if(this.lang == 'NL'){
          this.errors['fName'] = `${fName} is geen naam. Een naam kan alleen letters bevatten.`;
        }else{
          this.errors['fName'] = `${fName} is not a name. A name can only contain letters.`;
        }
        this.validFName = false;
        this.fNameIsValid = false;
        this.fNameHasError = true;
      }else{
        this.errors['fName'] = null;
        this.validFName = true;
        this.fNameIsValid = true;
        this.fNameHasError = false;
      }
    },
    checkLName: function(lName) {
      if(lName == null || lName == '' || lName == 'null'){
        if(this.lang == 'NL'){
          this.errors['lName'] = 'Achternaam kan niet leeg zijn.';
        }else{
          this.errors['lName'] = 'Last name can not be empty.';
        }
        this.validLName = false;
        this.lNameIsValid = false;
        this.lNameHasError = true;
      }else if(!this.validateName(lName)){
        if(this.lang == 'NL'){
          this.errors['lName'] = `${lName} is geen naam. Een naam kan alleen letters bevatten.`;
        }else{
          this.errors['lName'] = `${lName} is not a name. A name can only contain letters.`;
        }
        this.validLName = false;
        this.lNameIsValid = false;
        this.lNameHasError = true;
      }else{
        this.errors['lName'] = null;
        this.validLName = true;
        this.lNameIsValid = true;
        this.lNameHasError = false;
      }
    },
    checkEmail: function(email) {
      if(email == null || email == '' || email == 'null'){
        if(this.lang == 'NL'){
          this.errors['email'] = 'E-mail kan niet leeg zijn.';
        }else{
          this.errors['email'] = 'E-mail can not be empty.';
        }
        this.validEmail = false;
        this.emailIsValid = false;
        this.emailHasError = true;
      }else if(!this.validateEmail(email)){
        if(this.lang == 'NL'){
          this.errors['email'] = `${email} is geen e-mailadres.`;
        }else{
          this.errors['email'] = `${email} is not a real e-amil adress.`;
        }
        this.validEmail = false;
        this.emailIsValid = false;
        this.emailHasError = true;
      }else{
        this.errors['email'] = null;
        this.validEmail = true;
        this.emailIsValid = true;
        this.emailHasError = false;
      }
    },
    checkPhone: function(phone) {
      if(phone == null || phone == '' || phone == 'null'){
        this.errors['phone'] = null;
        this.validPhone = true;
        this.phoneIsValid = true;
        this.phoneHasError = false;
      }else if(!this.validatePhone(phone)){
        if(this.lang == 'NL'){
          this.errors['phone'] = `${phone} is niet een echt telefoonnummer.`;
        }else{
          this.errors['phone'] = `${phone} is not a real phone number.`;
        }
        this.validPhone = false;
        this.phoneIsValid = false;
        this.phoneHasError = true;
      }else{
        this.errors['phone'] = null;
        this.validPhone = true;
        this.phoneIsValid = true;
        this.phoneHasError = false;
      }
    },
    checkMessage: function(message) {
      if(message == null || message == '' || message == 'null'){
        if(this.lang == 'NL'){
          this.errors['message'] = 'Bericht kan niet leeg zijn.';
        }else{
          this.errors['message'] = 'Message can not be empty.';
        }
        this.validMessage = false;
        this.messageIsValid = false;
        this.messageHasError = true;
      }else{
        this.errors['message'] = null;
        this.validMessage = true;
        this.messageIsValid = true;
        this.messageHasError = false;
      }
    },
    validateName: function(name){
      const re = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]*$/;
      return re.test(name);
    },
    validateEmail: function(email){
      const re = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
      return re.test(email);
    },
    validatePhone: function(phone){
      const re = /^[0-9]*$/;
      return re.test(phone);
    }
  }
});