<?php
include_once "header.php";
?>
    <header class="showcase-reservation">
      <div class="container showcase-inner">
        <div class="card">
          
          <!----form begins--------------------------------------------------------------->
          <div class="front-form">
            <form action="includes/process.inc.php" method="POST" id="regForm">
              <!-- one -->

              <div class="tab">
               
      
                <div class="error" id="genError00"></div>
               
              
              <div>
              <input
                  type="text"
                  name="first-name"
                  id="first-name"
                  placeholder="First Name"
                  oninput="this.className = ''"
                  class="inputGroup_0"
                  onchange="validateFirstName()"
                />
                </div> 
                <div class="error" id="errMsg01"></div>

                <input
                  type="text"
                  name="last-name"
                  id="last-name"
                  placeholder="Last Name"
                  oninput="this.className = ''"
                  class="inputGroup_0"
                  onchange="validateLastName()"
                />
                <div class="error" id="errMsg02"></div>

                
                
                <input
                  type="text"
                  name="phone"
                  id="phone"
                  placeholder="Phone Number"
                  oninput="this.className = ''"
                  class="inputGroup_0"
                  onchange="validateNumber()"
                />
                <p>Example: 555-123-1234</p>
                <div class="error" id="errMsg03"></div>
              </div>

              <!-- two -->

              <div class="tab">
                <h4>
                  Please enter the date and<br> time you wish to dine with us
                </h4>
                <div class="error" id="genError01"></div>

                <!---some code....date and time-->

                <input
                  type="text"
                  id="dateInput"
                  name="dateInput"
                  placeholder="enter date"
                  onchange="validateDate()"
                />
                <div class="error" id="errMsg04"></div>

                <input
                  type="text"
                  id="timeInput"
                  name="timeInput"
                  placeholder="enter time"
                  onchange="validateTime()"
                />
                <div class="error" id="errMsg05"></div>
              </div>

              <!-- three -->

              <div class="tab">
                <div class="error" id="genError02"></div>
                <h4>Please enter the number of guests in your party*</h4>
                <p>*Rick's can comfortably seat up to 12 guests</p>
                
                <input
                  maxlength="2"
                  id="guests"
                  type="text"
                  name="guests"
                  oninput="this.className = ''"
                  class="inputGroup_3"
                  onchange="validateGuestNum()"
                />
                <div class="error" id="errMsg06"></div>
                
                
                <h4>Do you or a guest need special accomodations?</h4>
                <section id="yes-no-radioBTN">
                  <div>
                  <input
                    type="radio"
                    name="accomodations"
                    id="yes-special"
                    class="radioGroup02"
                    value="yes"
                  />
                  <label for="yes">Yes</label>
                  </div>
                   <div>
                  <input
                    type="radio"
                    name="accomodations"
                    id="no-special"
                    class="radioGroup02"
                    value="no"
                  />
                <label for="no">No</label>
                </div>
                </section>

                <section id="special-note">
                  Please enter your accomodation requirements</h3>
                  <div>
                  <textarea name="special-note" cols="30" rows="3" id="textarea" maxlength="58"></textarea>
                </div>
                </section>
              </div>

              <!-- four -->
              <div class="tab">
                <h4>Seating preference</h4>
                <div class="error" id="genError03"></div>
                <section id="seat-pref-radioBTN">
                
              <div> 
                <input
                  type="radio"
                  name="preference"
                  id="no"
                  value="non-smoking"
                  class="radioGroup03"
                />
                <label for="nonsmoking">Non-Smoking</label>
              </div> 

              <div>
                <input
                  type="radio"
                  name="preference"
                  id="yes"
                  value="smoking"
                  class="radioGroup03"
                />
                <label for="smoking">Smoking</label>
              </div>
              <div>
                <input
                  type="radio"
                  name="preference"
                  id="nopref"
                  value="no-preference"
                  class="radioGroup03"
                />
                <label for="nonsmoking">No Preference</label>
              </div>
                </section>
              </div>

              <!-- submit btn -->
              <div class="btn-container">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="button">
                  Previous
                </button>
                <button
                  type="button"
                  id="nextBtn"
                  name="submitForm"
                  onclick="nextPrev(1)"
                  class="button"
                >
                  Next
                </button>
                <!-- on submit, type attribute must change to "submit"-->
              </div>

              <!--CIRCLES-->

              <div>
                <!-- some code to make circles -->
                <div id="stepSpace">
                  <span class="step"></span>
                  <span class="step"></span>
                  <span class="step"></span>
                  <span class="step"></span>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </header>
<?php
include_once 'footer.php';
?>


