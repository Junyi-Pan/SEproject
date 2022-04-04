const form = document.getElementById('registrationForm')
const fname = document.getElementById('fName')
const lname = document.getElementById('lName')
const email = document.getElementById('email')
const password = document.getElementById('password')
const passwordMatch = document.getElementById('confirmPassword')
const address1 = document.getElementById('mailAddress1')
const address2 = document.getElementById('mailAddress2')
const city = document.getElementById('mailCity')
const state = document.getElementById('mailState')
const zip = document.getElementById('mailZip')
const cardname = document.getElementById('cardName')
const cardnumber = document.getElementById('cardNum')
const expmonth = document.getElementById('expMon')
const expyear = document.getElementById('expYear')
const cvv = document.getElementById('cvv')


function checkInputs() {	
	  const fnameValue = fname.value.trim();
	  const lnameValue = lname.value.trim();
	  const emailValue = email.value.trim();
	  const passValue = password.value.trim();
	  const passMatValue = passwordMatch.value.trim();
	  const address1Value = address1.value.trim();
	  const address2Value = address2.value.trim();
	  const cityValue = city.value.trim();
	  const stateValue = state.value.trim();
	  const zipValue = zip.value.trim();
	  const cardnameValue = cardname.value.trim();
	  const cardnumberValue = cardnumber.value.trim();
	  const expmonthValue = expmonth.value.trim();
	  const expyearValue = expyear.value.trim();
	  const cvvValue = cvv.value.trim();

  if (fnameValue === "") {
    setErrorFor(fname, 'Name cannot be blank');
  } else if (!isNaN(fnameValue)) {
    setErrorFor(fname, 'Invalid input');
  } else {
    setValidFor(fname);
  }
  if (lnameValue === "") {
    setErrorFor(lname, 'Name cannot be blank');
  } else if (!isNaN(lnameValue)) {
    setErrorFor(lname, 'Invalid input');
  } else {
    setValidFor(lname);
  }
  if (passValue === "") {
	setErrorFor(password, 'Password cannot be blank');
  } else if (!validatePassword(passValue)) {
	setErrorFor(password, 'Password must be between 7 to 15 characters and contain at least one numeric digit and a special character');
  } else {
	setValidFor(password);
  }
    if (passValue === "") {
	setErrorFor(passwordMatch, 'Password cannot be blank');
    } else if (passValue !== passMatValue) {
	setErrorFor(passwordMatch, 'Passwords do not match'); 
    } else {
	setValidFor(passwordMatch);
	}
  if (emailValue === "") {
    setErrorFor(email, 'Email cannot be blank');
  } else if (!validateEmail(emailValue)) {
    setErrorFor(email, 'Invalid input');
  } else {
    setValidFor(email);
  } 
  if (address1Value === "") {
    setErrorFor(address1, 'Address cannot be blank');
  } else {
    setValidFor(address1);
  }
  
  // Need requirements for address 2?
  
  if (cityValue === "") {
    setErrorFor(city, 'City cannot be blank');
  } else if (!isNaN(cityValue)) {
    setErrorFor(city, 'Invalid input');
  } else {
    setValidFor(city);
  }
  if (stateValue === "") {
    setErrorFor(state, 'State cannot be blank');
  } else if (!isNaN(stateValue)) {
    setErrorFor(state, 'Invalid input');
  } else {
    setValidFor(state);
  }
  if (zipValue === "") {
    setErrorFor(zip, 'Zip code cannot be blank');
  } else if (isNaN(zipValue) || zipValue < 0) {
    setErrorFor(zip, 'Invalid input');
  }else {
    setValidFor(zip);
  }
  if (cardnameValue === "") {
    setErrorFor(cardname, 'Card Name cannot be blank');
  } else if (!isNaN(cardnameValue)) {
    setErrorFor(cardname, 'Invalid input');
  } else {
    setValidFor(cardname);
  }
  if (cardnumberValue === "") {
    setErrorFor(cardnumber, 'Card number cannot be blank');
  } else if (isNaN(cardnumberValue)) {
    setErrorFor(cardnumber, 'Invalid input');
  } else {
    setValidFor(cardnumber);
  }
  if (expmonthValue === "") {
    setErrorFor(expmonth, 'Expiry month cannot be blank');
  } else if (isNaN(expmonthValue)) {
    setErrorFor(expmonth, 'Invalid input');
  } else {
    setValidFor(expmonth);
  }
  if (expyearValue === "") {
    setErrorFor(expyear, 'Expiry year cannot be blank');
  } else if (isNaN(expyearValue) || expyearValue < 22) {
    setErrorFor(expyear, 'Invalid input');
  } else {
    setValidFor(expyear);
  }
  if (cvvValue === "") {
    setErrorFor(cvv, 'CVV cannot be blank');
  } else if (isNaN(cvvValue) || cvvValue < 0 || cvvValue > 999) {
    setErrorFor(cvv, 'Invalid input');
  } else {
    setValidFor(cvv);
  }
	return hasClass(fname, 'field-valid') && hasClass(lname, 'field-valid') && hasClass(email, 'field-valid') && hasClass(password, 'field-valid') 
	&& hasClass(passwordMatch, 'field-valid') && hasClass(address1, 'field-valid') && hasClass(city, 'field-valid') 
	&& hasClass(state, 'field-valid') && hasClass(zip, 'field-valid') && hasClass(cardname, 'field-valid') 
	&& hasClass(cardnumber, 'field-valid') && hasClass(expmonth, 'field-valid') && hasClass(expyear, 'field-valid') 
	&& hasClass(cvv, 'field-valid');
}

function setErrorFor(input, message) {
  const formControl = input.parentElement; //.field
  const p = formControl.querySelector('p');

  p.innerText = message;

  formControl.className = 'field-error';
}

function setValidFor(input) {
  const formControl = input.parentElement;
  formControl.className = 'field-valid';
}

function validateEmail(email) {
  const res = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return res.test(String(email).toLowerCase());
}

/* 
 * To check a password between 7 to 15 characters which contain
 * at least one numeric digit and a special character
 */
 function validatePassword(password) {
	var paswd =  /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
	return paswd.test(String(password).toLowerCase());
 }
 
 function hasClass(element, clsName) {
        return(' ' + element.parentElement.className + ' ').indexOf(' ' + clsName + ' ') > -1;
      }

