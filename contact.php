<?php
  include 'templates/header.php';
  ob_start();
  session_start();

?>
    <?php include 'templates/jumbotron.php'; ?>

    <div class = "container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Contact Us</h1>
        <p class="lead">Contact our experienced Customer Service team to provide a comment or ask a question about your local store</p>
        <p><strong>Call 1-800-555-1234 or email ify@ingredientsforyou.com</strong><br>
        Address: 123 Main Street, Fort Collins, CO 80521<br>
        Fax Number: 970-232-0005
        </p>
        <p class="lead">Have a question or want further information?</p>
        
        <p>Fill in the short form and we will get back to you as soon as possible.</p> <br> 
      </div>   
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <!-- BEGIN DOWNLOAD PANEL -->
        <div class="panel panel-default well">
          <?php
              if (isset($_POST['op']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['emailaddress'])) {
                if(isset($_POST['phone'])){
                  $phone = filter_var($_POST['phone'],FILTER_VALIDATE_INT);
                }
                $country = "United States";
                if(isset($_POST['country']))
                  $country = $_POST['country'];
                
                $name  = $_POST['firstname']. " ".$_POST['lastname'];
                $email = filter_var($_POST['emailaddress'], FILTER_SANITIZE_EMAIL);
              	$subject  = "Email from User with IP: ".$_SERVER['REMOTE_ADDR'];
                $content  = $name. " sent you a message from".$country." submitted from https://www.cs.colostate.edu/~mjrerle/p1/contact.php\nEmail them back at: ".$email."\n";
                if(isset($_POST['phone'])) $content.="Phone: ".$phone."\n";
                if(isset($_POST['company'])) $content.="Company: ".$_POST['company']."\n";
                error_reporting(0);
                if(mail('mjrerle@rams.colostate.edu', 'From Project 1 Lab: '.$subject, $content.$_POST['Comments'])) {
                  echo "<h2 align=\"center\">Your Email was Sent</h2>\n";
                  echo "<p>$name, your comment:</p>\n";
                  echo "<blockquote> \n". $_POST['Comments']." \n </blockquote>\n";
	              } 
                else {
                  echo "<p>$name, there was an error trying to send your comment.</p>\n";
            	  }
              } 
              else if (isset($_POST['op']) && (empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['emailaddress']))) {
                if(!isset($_POST['firstname']) || empty($_POST['firstname'])){?><p style="color:red">Missing first name</p><?php }
                if(!isset($_POST['lastname']) || empty($_POST['lastname'])){ ?><p style="color:red">Missing last name</p><?php }
                if(!isset($_POST['emailaddress']) || empty($_POST['emailaddress'])){ ?><p style="color:red">Missing email address</p><?php }

                //tell user to enter required filed
                ?> <a href="contact.php">You must fill in every required field! Click here to refresh!</a><br>
                <?php
              }
              else { ?>
          <div class="panel-body">
            <form action="contact.php" class="form-horizontal track-event-form bv-form" data-goaltype="”General”" data-formname="”ContactUs”" method="post" id="contact-us-all" novalidate="novalidate">
              <input name="elqSiteId" type="hidden" value="928">
              <input name="sFDCLastCampaignID" type="hidden" value="701400000012Lql">
              <input name="elqFormName" type="hidden" value="EMEAAllContactUsSubmissions">
              <input name="nexturl" type="hidden" value="">
              <input name="Partner" type="hidden" value="">
              <input name="language" type="hidden" value="en">

              <div class="form-group">               
                <div class="col-sm-6">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <span class="glyphicon glyphicon-user"></span>
                            </div>
                    <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter first name *required*" name="firstname" data-bv-field="firstname">
                        </div>
                    <small data-bv-validator="notEmpty" data-bv-validator-for="firstname" class="help-block" style="display: none;">Required</small></div>                
                <div class="col-sm-6">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <span class="glyphicon glyphicon-user"></span>
                            </div>
                    <input type="text" class="form-control" id="exampleInputLastName" placeholder="Enter last name *required*" name="lastname" data-bv-field="lastname"></div>
                        <small data-bv-validator="notEmpty" data-bv-validator-for="lastname" class="help-block" style="display: none;">Required</small></div>
                        </div>

              <div class="form-group">               
                          <div class="col-sm-6">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <span class="glyphicon glyphicon-envelope"></span>
                            </div>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email *required*" name="emailaddress" data-bv-field="emailaddress">
                        </div>
                    <small data-bv-validator="notEmpty" data-bv-validator-for="emailaddress" class="help-block" style="display: none;">Required</small></div>                
                          <div class="col-sm-6">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <span class="glyphicon glyphicon-briefcase"></span>
                            </div>
                            <input type="text" class="form-control" id="exampleInputCompany" placeholder="Enter company" name="company">
                  </div>
                        </div>
              </div>
              
                      <div class="form-group">
                        <div class="col-sm-6">
                          <div class="input-group">
                              <div class="input-group-addon">
                      <span class="glyphicon glyphicon-globe"></span>          
                              </div>                        
                        
                    <select data-placeholder="Choose country" class="C_Country_Modal form-control" id="country" name="country" data-bv-field="country">
                              <option value="">--Select--</option>
                      <option value="United States">United States</option>
                      <option value="Afghanistan">Afghanistan</option>
                      <option value="Albania">Albania</option>
                      <option value="Algeria">Algeria</option>
                              <option value="American Samoa">American Samoa</option>
                              <option value="Andorra">Andorra</option>
                      <option value="Angola">Angola</option>
                      <option value="Anguilla">Anguilla</option>
                      <option value="Antarctica">Antarctica</option>
                      <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Aruba">Aruba</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bermuda">Bermuda</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Bouvet Island">Bouvet Island</option>
                        <option value="Brazil">Brazil</option>
                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Cayman Islands">Cayman Islands</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                              <option value="Chile">Chile</option>
                              <option value="China">China</option>
                              <option value="Christmas Island">Christmas Island</option>
                              <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                              <option value="Colombia">Colombia</option>
                              <option value="Comoros">Comoros</option>
                              <option value="Congo">Congo</option>
                              <option value="Congo, The Democratic Republic of the">Congo, The Democratic Republic of the</option>
                              <option value="Cook Islands">Cook Islands</option>
                              <option value="Costa Rica">Costa Rica</option>
                              <option value="CÙte d'Ivoire">Côte d'Ivoire</option>
                              <option value="Croatia">Croatia</option>
                              <option value="Cuba">Cuba</option>
                              <option value="Cyprus">Cyprus</option>
                              <option value="Czech Republic">Czech Republic</option>
                              <option value="Denmark">Denmark</option>
                              <option value="Djibouti">Djibouti</option>
                              <option value="Dominica">Dominica</option>
                              <option value="Dominican Republic">Dominican Republic</option>
                              <option value="Ecuador">Ecuador</option>
                              <option value="Egypt">Egypt</option>
                              <option value="El Salvador">El Salvador</option>
                              <option value="Equatorial Guinea">Equatorial Guinea</option>
                              <option value="Eritrea">Eritrea</option>
                              <option value="Estonia">Estonia</option>
                              <option value="Ethiopia">Ethiopia</option>
                              <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                              <option value="Faroe Islands">Faroe Islands</option>
                              <option value="Fiji">Fiji</option>
                              <option value="Finland">Finland</option>
                              <option value="France">France</option>
                              <option value="French Guiana">French Guiana</option>
                              <option value="French Polynesia">French Polynesia</option>
                              <option value="French Southern Territories">French Southern Territories</option>
                              <option value="Gabon">Gabon</option>
                              <option value="Gambia">Gambia</option>
                              <option value="Georgia">Georgia</option>
                              <option value="Germany">Germany</option>
                              <option value="Ghana">Ghana</option>
                              <option value="Gibraltar">Gibraltar</option>
                              <option value="Greece">Greece</option>
                              <option value="Greenland">Greenland</option>
                              <option value="Grenada">Grenada</option>
                              <option value="Guadeloupe">Guadeloupe</option>
                              <option value="Guam">Guam</option>
                              <option value="Guatemala">Guatemala</option>
                              <option value="Guernsey">Guernsey</option>
                              <option value="Guinea">Guinea</option>
                              <option value="Guinea-Bissau">Guinea-Bissau</option>
                              <option value="Guyana">Guyana</option>
                              <option value="Haiti">Haiti</option>
                              <option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
                              <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                              <option value="Honduras">Honduras</option>
                              <option value="Hong Kong">Hong Kong</option>
                              <option value="Hungary">Hungary</option>
                              <option value="Iceland">Iceland</option>
                              <option value="India">India</option>
                              <option value="Indonesia">Indonesia</option>
                              <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                              <option value="Iraq">Iraq</option>
                              <option value="Ireland">Ireland</option>
                              <option value="Isle of Man">Isle of Man</option>
                              <option value="Israel">Israel</option>
                              <option value="Italy">Italy</option>
                              <option value="Jamaica">Jamaica</option>
                              <option value="Japan">Japan</option>
                              <option value="Jersey">Jersey</option>
                              <option value="Jordan">Jordan</option>
                              <option value="Kazakhstan">Kazakhstan</option>
                              <option value="Kenya">Kenya</option>
                              <option value="Kiribati">Kiribati</option>
                              <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                              <option value="Korea, Republic of">Korea, Republic of</option>
                              <option value="Kuwait">Kuwait</option>
                              <option value="Kyrgyzstan">Kyrgyzstan</option>
                              <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                              <option value="Latvia">Latvia</option>
                              <option value="Lebanon">Lebanon</option>
                              <option value="Lesotho">Lesotho</option>
                              <option value="Liberia">Liberia</option>
                              <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                              <option value="Liechtenstein">Liechtenstein</option>
                              <option value="Lithuania">Lithuania</option>
                              <option value="Luxembourg">Luxembourg</option>
                              <option value="Macao">Macao</option>
                              <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                              <option value="Madagascar">Madagascar</option>
                              <option value="Malawi">Malawi</option>
                              <option value="Malaysia">Malaysia</option>
                              <option value="Maldives">Maldives</option>
                              <option value="Mali">Mali</option>
                              <option value="Malta">Malta</option>
                              <option value="Marshall Islands">Marshall Islands</option>
                              <option value="Martinique">Martinique</option>
                              <option value="Mauritania">Mauritania</option>
                              <option value="Mauritius">Mauritius</option>
                              <option value="Mayotte">Mayotte</option>
                              <option value="Mexico">Mexico</option>
                              <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                              <option value="Moldova, Republic of">Moldova, Republic of</option>
                              <option value="Monaco">Monaco</option>
                              <option value="Mongolia">Mongolia</option>
                              <option value="Montenegro">Montenegro</option>
                              <option value="Montserrat">Montserrat</option>
                              <option value="Morocco">Morocco</option>
                              <option value="Mozambique">Mozambique</option>
                              <option value="Myanmar">Myanmar</option>
                              <option value="Namibia">Namibia</option>
                              <option value="Nauru">Nauru</option>
                              <option value="Nepal">Nepal</option>
                              <option value="Netherlands">Netherlands</option>
                              <option value="Netherlands Antilles">Netherlands Antilles</option>
                              <option value="New Caledonia">New Caledonia</option>
                              <option value="New Zealand">New Zealand</option>
                              <option value="Nicaragua">Nicaragua</option>
                              <option value="Niger">Niger</option>
                              <option value="Nigeria">Nigeria</option>
                              <option value="Niue">Niue</option>
                              <option value="Norfolk Island">Norfolk Island</option>
                              <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                              <option value="Norway">Norway</option>
                              <option value="Oman">Oman</option>
                              <option value="Pakistan">Pakistan</option>
                              <option value="Palau">Palau</option>
                              <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                              <option value="Panama">Panama</option>
                              <option value="Papua New Guinea">Papua New Guinea</option>
                              <option value="Paraguay">Paraguay</option>
                              <option value="Peru">Peru</option>
                              <option value="Philippines">Philippines</option>
                              <option value="Pitcairn">Pitcairn</option>
                              <option value="Poland">Poland</option>
                              <option value="Portugal">Portugal</option>
                              <option value="Puerto Rico">Puerto Rico</option>
                              <option value="Qatar">Qatar</option>
                              <option value="Reunion">Reunion</option>
                              <option value="Romania">Romania</option>
                              <option value="Russian Federation">Russian Federation</option>
                              <option value="Rwanda">Rwanda</option>
                              <option value="Saint BarthÈlemy">Saint Barthélemy</option>
                              <option value="Saint Helena">Saint Helena</option>
                              <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                              <option value="Saint Lucia">Saint Lucia</option>
                              <option value="Saint Martin">Saint Martin</option>
                              <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                              <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                              <option value="Samoa">Samoa</option>
                              <option value="San Marino">San Marino</option>
                              <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                              <option value="Saudi Arabia">Saudi Arabia</option>
                              <option value="Senegal">Senegal</option>
                              <option value="Serbia">Serbia</option>
                              <option value="Seychelles">Seychelles</option>
                              <option value="Sierra Leone">Sierra Leone</option>
                              <option value="Singapore">Singapore</option>
                              <option value="Slovakia">Slovakia</option>
                              <option value="Slovenia">Slovenia</option>
                              <option value="Solomon Islands">Solomon Islands</option>
                              <option value="Somalia">Somalia</option>
                              <option value="South Africa">South Africa</option>
                              <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                              <option value="Spain">Spain</option>
                              <option value="Sri Lanka">Sri Lanka</option>
                              <option value="Sudan">Sudan</option>
                              <option value="Suriname">Suriname</option>
                              <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                              <option value="Swaziland">Swaziland</option>
                              <option value="Sweden">Sweden</option>
                              <option value="Switzerland">Switzerland</option>
                              <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                              <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                              <option value="Tajikistan">Tajikistan</option>
                              <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                              <option value="Thailand">Thailand</option>
                              <option value="Timor-Leste">Timor-Leste</option>
                              <option value="Togo">Togo</option>
                              <option value="Tokelau">Tokelau</option>
                              <option value="Tonga">Tonga</option>
                              <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                              <option value="Tunisia">Tunisia</option>
                              <option value="Turkey">Turkey</option>
                              <option value="Turkmenistan">Turkmenistan</option>
                              <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                              <option value="Tuvalu">Tuvalu</option>
                              <option value="Uganda">Uganda</option>
                              <option value="Ukraine">Ukraine</option>
                              <option value="United Arab Emirates">United Arab Emirates</option>
                              <option value="United Kingdom">United Kingdom</option>
                              <option value="United States Minor Outlying Island">United States Minor Outlying Island</option>
                              <option value="Uruguay">Uruguay</option>
                              <option value="Uzbekistan">Uzbekistan</option>
                              <option value="Vanuatu">Vanuatu</option>
                              <option value="Venezuela">Venezuela</option>
                              <option value="Viet Nam">Viet Nam</option>
                              <option value="Virgin Islands, British">Virgin Islands, British</option>
                              <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                              <option value="Wallis and Futuna">Wallis and Futuna</option>
                              <option value="Western Sahara">Western Sahara</option>
                              <option value="Yemen">Yemen</option>
                              <option value="Zambia">Zambia</option>
                              <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                  </div>
                      <small data-bv-validator="callback" data-bv-validator-for="country" class="help-block" style="display: none;">Choose one</small></div>
      
                        <div class="col-sm-6">
                          <div class="input-group" style="display: none;">
                    <div class="input-group-addon">
                      <span class="glyphicon glyphicon-globe"></span>          
                              </div>
                            
                    <select data-placeholder="Choose state" class="C_State_Prov_Modal form-control" id="C_State_Prov" name="C_State_Prov">
                              <option value="" selected="selected">- Not applicable -</option>
                              <option value="AL">Alabama</option>
                              <option value="AK">Alaska</option>
                              <option value="AZ">Arizona</option>
                              <option value="AR">Arkansas</option>
                              <option value="CA">California</option>
                              <option value="CO">Colorado</option>
                              <option value="CT">Connecticut</option>
                              <option value="DE">Delaware</option>
                              <option value="DC">District Of Columbia</option>
                              <option value="FL">Florida</option>
                              <option value="GA">Georgia</option>
                              <option value="HI">Hawaii</option>
                              <option value="ID">Idaho</option>
                              <option value="IL">Illinois</option>
                              <option value="IN">Indiana</option>
                              <option value="IA">Iowa</option>
                              <option value="KS">Kansas</option>
                              <option value="KY">Kentucky</option>
                              <option value="LA">Louisiana</option>
                              <option value="ME">Maine</option>
                              <option value="MD">Maryland</option>
                              <option value="MA">Massachusetts</option>
                              <option value="MI">Michigan</option>
                              <option value="MN">Minnesota</option>
                              <option value="MS">Mississippi</option>
                              <option value="MO">Missouri</option>
                              <option value="MT">Montana</option>
                              <option value="NE">Nebraska</option>
                              <option value="NV">Nevada</option>
                              <option value="NH">New Hampshire</option>
                              <option value="NJ">New Jersey</option>
                              <option value="NM">New Mexico</option>
                              <option value="NY">New York</option>
                              <option value="NC">North Carolina</option>
                              <option value="ND">North Dakota</option>
                              <option value="OH">Ohio</option>
                              <option value="OK">Oklahoma</option>
                              <option value="OR">Oregon</option>
                              <option value="PA">Pennsylvania</option>
                              <option value="RI">Rhode Island</option>
                              <option value="SC">South Carolina</option>
                              <option value="SD">South Dakota</option>
                              <option value="TN">Tennessee</option>
                              <option value="TX">Texas</option>
                              <option value="UT">Utah</option>
                              <option value="VT">Vermont</option>
                              <option value="VA">Virginia</option>
                              <option value="WA">Washington</option>
                              <option value="WV">West Virginia</option>
                              <option value="WI">Wisconsin</option>
                              <option value="WY">Wyoming</option>
                              <option value="AB">Alberta</option>
                              <option value="BC">British Columbia</option>
                              <option value="MB">Manitoba</option>
                              <option value="NB">New Brunswick</option>
                              <option value="NL">Newfoundland and Labrador</option>
                              <option value="NS">Nova Scotia</option>
                              <option value="NT">Northwest Territories</option>
                              <option value="NU">Nunavut</option>
                              <option value="ON">Ontario</option>
                              <option value="PE">Prince Edward Island</option>
                              <option value="QC">Quebec</option>
                              <option value="SK">Saskatchewan</option>
                              <option value="YT">Yukon</option>
                            </select>
                  </div>
                        </div>
                      </div>
                      
                      <div class="form-group">
                <div class="col-sm-12">
                  <div class="input-group">
                              <div class="input-group-addon">
                      <span class="glyphicon glyphicon-earphone"></span>          
                    </div>
                    <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone">
                  </div>                                    
                </div>
                      </div>
                
                      <div class="form-group">
                        <div class="col-sm-12">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <span class="glyphicon glyphicon-comment"></span>                
                    </div>                  
                    <textarea class="form-control" name="Comments" id="Comments" rows="5" style="width:99.9%" placeholder="Enter your message here"></textarea>
                  </div>                                    
                </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-sm-12">
                  <button id="contacts-submit" type="submit" class="btn btn-default btn-info">CONTACT US</button>
                        </div>
                      </div>
            <input type="hidden" value="done" name="op"></form>
          <?php }?>
          </div><!-- end panel-body -->
        </div><!-- end panel -->
        <!-- END DOWNLOAD PANEL -->
      </div>
      </div><!-- end col-md-8 -->
      <div class="col-md-2"> </div>
        </div>

    </div>

<?php include 'templates/footer.php';?>
