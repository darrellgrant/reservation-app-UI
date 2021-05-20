/*****************************************************************/
//form FUNCTIONALITY, transition thru tabs

let currentTab = 0;

showTab(currentTab);

function showTab(n) {
  let x = document.querySelectorAll(".tab");

  if (x.length === 0) {
    return;
  }
  console.log(x);

  x[n].style.display = "block";

  if (n == 0) {
    document.querySelector("#prevBtn").style.display = "none";
  } else {
    document.querySelector("#prevBtn").style.display = "inline";
  }
  if (n == x.length - 1) {
    document.querySelector("#nextBtn").innerHTML = "Submit";
    //some code to add the type attribute "submit"
  } else {
    document.querySelector("#nextBtn").innerHTML = "Next";
  }

  fixStepIndicator(n);
}

function nextPrev(n) {
  let x = document.querySelectorAll(".tab");
  if (n == 1 && !validateForm()) return false;
  if (
    n == 1 &&
    (!validateFirstName() ||
      !validateLastName() ||
      !validateNumber() ||
      !validateDate() ||
      !validateTime() ||
      !validateGuestNum())
  )
    return false;
  x[currentTab].style.display = "none";
  currentTab = currentTab + n;

  if (currentTab >= x.length) {
    document.getElementById("nextBtn").setAttribute("type", "submit");
    document.querySelector("#regForm").submit();
    document.querySelector("#regForm").style.display = "none";
    return false;
  }
  showTab(currentTab);
}

function validateForm() {
  let x,
    y,
    i,
    valid = true;
  let count1 = 0;
  let count2 = 0;

  x = document.querySelectorAll(".tab");
  y = x[currentTab].querySelectorAll("input");
  console.log(y);

  for (i = 0; i < y.length; i++) {
    if (y[i].value == "") {
      y[i].className += " invalid";
      valid = false;
    } //end if
    if (currentTab == 2) {
      let rg02 = document.getElementsByClassName("radioGroup02");
      for (i = 0; i < rg02.length; i++) {
        if (rg02[i].type == "radio" && rg02[i].checked == false) {
          count1++;
        }
      }
      if (count1 == rg02.length) {
        valid = false;
      }
    } //end if 2
    if (currentTab == 3) {
      let rg03 = document.getElementsByClassName("radioGroup03");
      for (i = 0; i < rg03.length; i++) {
        if (rg03[i].type == "radio" && rg03[i].checked == false) {
          count2++;
        }
      }

      if (count2 == rg03.length) {
        valid = false;
      }
    } //end if 3
  } //end loop
  if (!valid) {
    validateTab(currentTab);
  }
  if (valid) {
    document.querySelectorAll(".step")[currentTab].className += " finish";
  }
  return valid;
}

function fixStepIndicator(n) {
  let i;
  let x = document.querySelectorAll(".step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }

  x[n].className += " active";
}

//end startReservation
/*****************************************************************/
//additonal form VALIDATION
//display alerts if all req. fields not filled

function validateTab(x) {
  const errorAlert = "--Please fill in required fields--";

  switch (x) {
    case 0:
      document.getElementById("genError00").innerHTML = errorAlert;

      break;
    case 1:
      document.getElementById("genError01").innerHTML = errorAlert;

      break;

    case 2:
      document.getElementById("genError02").innerHTML = errorAlert;
      break;

    case 3:
      document.getElementById("genError03").innerHTML = errorAlert;
      break;

    default:
      alert("error");
  }
}

/*****************************************************************/
//*****************validate text inputs using reg ex*********************

function validateFirstName() {
  let inputError;
  let firstName = document.querySelector("#first-name").value.trim();
  let errMsg01 = document.querySelector("#errMsg01");
  let letters = /^[a-zA-Z\s]+$/;
  let firstNameInput = document.querySelector("#first-name");
  let valid = true;

  if (firstName != "" && !letters.test(firstName)) {
    errMsg01.innerHTML = "Please enter only letters";
    valid = "false;";

    firstNameInput.onkeyup = function () {
      errMsg01.innerHTML = "";
    };
  }
  return valid;
}

function validateLastName() {
  let lastName = document.querySelector("#last-name").value.trim();
  let errMsg02 = document.querySelector("#errMsg02");
  let letters = /^[a-zA-Z\s]+$/;
  let lastNameInput = document.querySelector("#last-name");
  let valid = true;
  console.log(lastName);
  if (lastName != "" && !letters.test(lastName)) {
    errMsg02.innerHTML = "Please enter only letters";
    valid = false;

    lastNameInput.onkeyup = function () {
      errMsg02.innerHTML = "";
    };
  }
  return valid;
}

function validateNumber() {
  let phoneNumber = document.querySelector("#phone").value.trim();
  let errMsg03 = document.querySelector("#errMsg03");
  let phoneInput = document.querySelector("#phone");
  let phoneCheck = /^(\d{3}-\d{3}-\d{4})*$/;
  let valid = true;

  if (phoneNumber != "" && !phoneCheck.test(phoneNumber)) {
    errMsg03.innerHTML =
      "Number entered does not match the correct pattern:<br> Example 123-456-7890";
    valid = false;
    phoneInput.onkeyup = function () {
      errMsg03.innerHTML = "";
    };
  }
  return valid;
}

function validateDate() {
  let dateInputValue = document.querySelector("#dateInput").value.trim();
  let errMsg04 = document.querySelector("#errMsg04");
  let dateInput = document.querySelector("#dateInput");
  let dateCheck =
    /^((0?[1-9]|1[012])[- /.](0?[1-9]|[12][0-9]|3[01])[- /.](19|20)?[0-9]{2})*$/;
  let valid = true;

  if (dateInputValue != "" && !dateCheck.test(dateInputValue)) {
    errMsg04.innerHTML = "Please enter date in format: mm/dd/yyyy";
    valid = false;
    dateInput.onkeyup = function () {
      errMsg04.innerHTML = "";
    };
  }
  return valid;
}

function validateTime() {
  let timeInputValue = document.querySelector("#timeInput").value.trim();
  let errMsg05 = document.querySelector("#errMsg05");
  let timeInput = document.querySelector("#timeInput");
  let timeCheck = /^\b((1[0-2]|0?[1-9]):([0-5][0-9]) ([AaPp][Mm]))$/;
  let valid = true;
  if (timeInputValue != "" && !timeCheck.test(timeInputValue)) {
    errMsg05.innerHTML = "Please enter time in format hh:mm";
    valid = false;
    timeInput.onkeyup = function () {
      errMsg05.innerHTML = "";
    };
  }
  return valid;
}

function validateGuestNum() {
  let guestValue = document.querySelector("#guests").value.trim();
  let errMsg06 = document.querySelector("#errMsg06");
  let guestInput = document.querySelector("#guests");
  let guestCheck = /(^0?[1-9]$)|(^1[0-2]$)/;
  let valid = true;
  if (guestValue != "" && !guestCheck.test(guestValue)) {
    errMsg06.innerHTML = "Please enter a value between 1 and 12";
    valid = false;
    guestInput.onkeyup = function () {
      errMsg06.innerHTML = "";
    };
  }
  return valid;
}
/*************************specialNote function***************************/
/*special accomodations-show special accomodations/accessibility textarea
if user chooses yes for special accomodations, then a textarea appears for
user to write what accomodations they require*/

let specialNote = document.getElementById("yes-special");

if (specialNote) {
  specialNote.addEventListener("click", showSpecialNote);
}
function showSpecialNote() {
  document.getElementById("special-note").style.display = "block";
}

/**********************displayNote function**********************************/

/* if during UPDATE user decides they do not want special accomodations,
clicks the "no" radio button,
then clear the text (placeholder text) from the textarea
and hide the textarea */

function displayNote(data) {
  let guestNote = document.getElementsByName("special-note")[0];
  guestNote.placeholder = "";

  if (data == 0) {
    guestNote.style.visibility = "hidden";
  } else {
    guestNote.style.visibility = "visible";
  }
}

/*******************************DIALOG BOX**************************/
/*
NOTE:
Dialog box script found in:
cancel.step2.php, above footer.php include
*/

/**********************************************************************/

/***************************VALIDATE CANCELATION FORM****************************/
let status = true;
function validateCancelForm(e) {
  let inputGroup = document.getElementsByClassName("input-c");
  let globalErrorMsg = document.getElementById("global-error-msg");

  if (
    inputGroup[0].value == "" ||
    inputGroup[1].value == "" ||
    inputGroup[2].value == ""
  ) {
    e.preventDefault();
    globalErrorMsg.innerHTML = "Please fill in all fields";
  }
  if (!status) {
    e.preventDefault();
  }
  console.log("Status is " + status);
}

let cancelBTN = document.getElementById("cancelBTN");
if (cancelBTN) {
  cancelBTN.addEventListener("click", function (e) {
    validateCancelForm(e);
  });

  function validateCancelInput() {
    let inputGroup = document.getElementsByClassName("input-c");
    let fname = inputGroup[0].value.trim();
    let lname = inputGroup[1].value.trim();
    let phone = inputGroup[2].value.trim();
    let errorGroup = document.getElementsByClassName("error-msg");
    let letters = /^[a-zA-Z\s]+$/;
    let phoneCheck = /^(\d{3}-\d{3}-\d{4})*$/;
    if (fname != "" && !letters.test(fname)) {
      errorGroup[1].innerHTML = "Please enter only letters";
      status = false;
      inputGroup[0].onkeyup = function () {
        errorGroup[1].innerHTML = "";
        status = true;
      };
    }

    if (lname != "" && !letters.test(lname)) {
      errorGroup[2].innerHTML = "Please enter only letters";
      status = false;
      inputGroup[1].onkeyup = function () {
        errorGroup[2].innerHTML = "";
        status = true;
      };
    }

    if (phone != "" && !phoneCheck.test(phone)) {
      errorGroup[3].innerHTML =
        "Number entered does not match the correct pattern:<br> Example 123-456-7890";
      status = false;
      inputGroup[2].onkeyup = function () {
        errorGroup[3].innerHTML = "";
        status = true;
      };
    }
    console.log(status);
    return status;
  }
}

/***************************VALIDATE UPDATE FORM****************************/
//validate entries in form used to update user entries (update.php)
/**********************************************************************/
//put all the error message divs into one collection/list
let errorTextGroup = document.querySelectorAll(".errorText");

console.log(errorTextGroup);

//Make sure form does not submit if any req. field is empty
valid = true;
function validateUpdateInput(e) {
  let inputGroup = document.getElementsByClassName("input1");

  let i;
  if (inputGroup) {
    for (i = 0; i < inputGroup.length; i++) {
      if (inputGroup[i].value == "") {
        e.preventDefault();
        document.getElementById("globalErrMSG").innerHTML =
          "Please fill in all required fields";
      }
    }
    for (i = 0; i < errorTextGroup.length; i++) {
      if (errorTextGroup[i].innerHTML != "") {
        e.preventDefault();
      }
    }
  }
}

let cancelUpdate = document.getElementById("update-submit");
if (cancelUpdate) {
  cancelUpdate.addEventListener("click", function (e) {
    validateUpdateInput(e);
  });
}

//make sure fields have correct data prior to submit

//first name->
let fn = document.getElementById("first-name");
if (fn) {
  fn.addEventListener("change", function () {
    let fnValue = fn.value.trim();
    let letters = /^[a-zA-Z\s]+$/;

    if (fnValue != "" && !letters.test(fnValue)) {
      errorTextGroup[0].innerHTML = "Please enter only letters";

      fn.onkeyup = function () {
        errorTextGroup[0].innerHTML = "";
      };
    }
  });
}

//last name->
let ln = document.getElementById("last-name");
if (ln) {
  ln.addEventListener("change", function () {
    let lnValue = ln.value.trim();
    let letters = /^[a-zA-Z\s]+$/;

    if (lnValue != "" && !letters.test(lnValue)) {
      errorTextGroup[1].innerHTML = "Please enter only letters";

      ln.onkeyup = function () {
        errorTextGroup[1].innerHTML = "";
      };
    }
  });
}

let phn = document.getElementById("phone");
if (phn) {
  phn.addEventListener("change", function () {
    let phnValue = phn.value.trim();
    let phoneCheck = /^(\d{3}-\d{3}-\d{4})*$/;

    if (phnValue != "" && !phoneCheck.test(phnValue)) {
      if (errorTextGroup.length === 0) {
        return;
      }
      errorTextGroup[2].innerHTML =
        "Please enter ph. number in format: 123-456-7890";

      phn.onkeyup = function () {
        errorTextGroup[2].innerHTML = "";
      };
    }
  });
}

let dt = document.getElementById("dateInput");
if (dt) {
  dt.addEventListener("change", function () {
    let dtValue = dt.value.trim();
    let dateCheck =
      /^((0?[1-9]|1[012])[- /.](0?[1-9]|[12][0-9]|3[01])[- /.](19|20)?[0-9]{2})*$/;

    if (dtValue != "" && !dateCheck.test(dtValue)) {
      errorTextGroup[3].innerHTML = "Please enter date in format: mm/dd/yyyy";

      dt.onkeyup = function () {
        errorTextGroup[3].innerHTML = "";
      };
    }
  });
}

let tm = document.getElementById("timeInput");
if (tm) {
  tm.addEventListener("change", function () {
    let tmValue = tm.value.trim();
    let timeCheck = /^\b((1[0-2]|0?[1-9]):([0-5][0-9]) ([AaPp][Mm]))$/;

    if (tmValue != "" && !timeCheck.test(tmValue)) {
      errorTextGroup[4].innerHTML = "Please enter time in format hh:mm";

      tm.onkeyup = function () {
        errorTextGroup[4].innerHTML = "";
      };
    }
  });
}

let gst = document.getElementById("guests");
if (gst) {
  gst.addEventListener("change", function () {
    let gstValue = gst.value.trim();
    let guestCheck = /(^0?[1-9]$)|(^1[0-2]$)/;

    if (gstValue != "" && !guestCheck.test(gstValue)) {
      errorTextGroup[5].innerHTML = "Please enter a value between 1 and 12";

      gst.onkeyup = function () {
        errorTextGroup[5].innerHTML = "";
      };
    }
  });
}

//function for side navigation
let toggleOn = document.getElementById("hamburger");
if (toggleOn) {
  toggleOn.addEventListener("click", openNav);
}

let toggleOff = document.getElementById("hamburger-x");
if (toggleOff) {
  toggleOff.addEventListener("click", closeNav);
}
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
