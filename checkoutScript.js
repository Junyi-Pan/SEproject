const form = document.getElementById('checkoutForm')
const fname = document.getElementById('fName')
const lname = document.getElementById('lName')
const email = document.getElementById('email')
const address1 = document.getElementById('address1')
//const address2 = document.getElementById('address2')
const city = document.getElementById('city')
const state = document.getElementById('state')
const zip = document.getElementById('zip')
const cardname = document.getElementById('cardName')
const cardnumber = document.getElementById('cardNum')
const expmonth = document.getElementById('expMon')
const expyear = document.getElementById('expYear')
const cvv = document.getElementById('cvv')

form.addEventListener('submit', (e) => {
  e.preventDefault()
  checkInputs();
});

function checkInputs() {
  const fnameValue = fname.value.trim();
  const lnameValue = lname.value.trim();
  const emailValue = email.value.trim();
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
    setErrorFor(fname, 'Invalid input')
  } else {
    setValidFor(fname);
  }
  if (lnameValue === "") {
    setErrorFor(lname, 'Name cannot be blank');
  } else if (!isNaN(lnameValue)) {
    setErrorFor(lname, 'Invalid input')
  } else {
    setValidFor(lname);
  }
  if (emailValue === "") {
    setErrorFor(email, 'Email cannot be blank');
  } else if (!validateEmail(emailValue)) {
    setErrorFor(email, 'Invalid input')
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
    setErrorFor(city, 'Invalid input')
  } else {
    setValidFor(city);
  }
  if (stateValue === "") {
    setErrorFor(state, 'State cannot be blank');
  } else if (!isNaN(stateValue)) {
    setErrorFor(state, 'Invalid input')
  } else {
    setValidFor(state);
  }
  if (zipValue === "") {
    setErrorFor(zip, 'Zip code cannot be blank');
  } else if (isNaN(zipValue) || zipValue < 0) {
    setErrorFor(zip, 'Invalid input')
  }else {
    setValidFor(zip);
  }
  if (cardnameValue === "") {
    setErrorFor(cardname, 'Card Name cannot be blank');
  } else if (!isNaN(cardnameValue)) {
    setErrorFor(cardname, 'Invalid input')
  } else {
    setValidFor(cardname);
  }
  if (cardnumberValue === "") {
    setErrorFor(cardnumber, 'Card number cannot be blank');
  } else if (isNaN(cardnumberValue)) {
    setErrorFor(cardnumber, 'Invalid input')
  } else {
    setValidFor(cardnumber);
  }
  if (expmonthValue === "") {
    setErrorFor(expmonth, 'Expiry month cannot be blank');
  } else if (!isNaN(expmonthValue)) {
    setErrorFor(expmonth, 'Invalid input')
  } else {
    setValidFor(expmonth);
  }
  if (expyearValue === "") {
    setErrorFor(expyear, 'Expiry year cannot be blank');
  } else if (isNaN(expyearValue) || expyearValue < 2021) {
    setErrorFor(expyear, 'Invalid input')
  } else {
    setValidFor(expyear);
  }
  if (cvvValue === "") {
    setErrorFor(cvv, 'CVV cannot be blank');
  } else if (isNaN(cvvValue) || cvvValue < 0 || cvvValue > 999) {
    setErrorFor(cvv, 'Invalid input')
  } else {
    setValidFor(cvv);
  }
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



