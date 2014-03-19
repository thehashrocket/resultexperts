    <div id="Instructions" class="span-24">
        <h1>Call Center Lead View Form</h1>
        <p>Welcome to the Call Center Leave View Form. If a call comes in via Fire Brand it will not appear in the normal
        QLI Lead View until you press "Update Lead" at the bottom before submitting the customer to any schools..</p>
        <ul>
            <li>When the call comes in, if you need to make any changes to the customers data update the fields and then press
        <b>Update Lead</b> at the bottom. Once completed, you can submit the customer to any leads.</li>
            <li>First, choose a college to submit to and press <b>Submit Lead</b> and fill in any extra data.</li>
            <li>When you submit it to the school you will get a thank you page. At the top of the screen, in the URL
                bar look for something like:</li>
            <ul>
                <li><em>http://www.collegesurfing.com/ce/thankyou/include/message-result.php?student_client_id=<b>37488692</b>&tkpix=S</em></li>
            </ul>
            <li>Copy the number after <b>student_client_id</b> and enter it in the <b>Student ID</b> field above <b>Record Lead</b> on this page.
        Finally, press <b>Record Lead</b> and your done!</li>
        </ul>
        <div class="span-22"><p class="notice">If you make any changes to the customers information, be sure to <b>UPDATE LEAD</b>
    before submitting the customer to any schools.</p></div>
    </div>

        <div id="ValidationErrors" class="span-24">
            <!-- Validation Errors Div -->

                    <?php echo validation_errors('<div class="span-9"><p class="error">', '</p></div>'); ?>
                    <?php
                        if (isset($error_message))
                {
                    echo '<div class="span-9"><p class="error">' . $error_message . '</p></div>';
                }
                    if (isset($success_message))
                {
                    echo '<div class="span-9"><p class="notice">' . $success_message . '</p></div>';
                }
                     ?>

                
        </div>

        <?php if (isset($firedata) && count($firedata)) : foreach ($firedata->result() as $row): ?>

                <div class="span-24 clear">
                <!-- BEGIN Left Hand Panel -->
            <div id="leftpanel" class="span-10">
                <!-- Lead Input/Update Form -->

            <?php
                echo form_open_multipart('/callcenter/lead_post/');
                echo form_hidden('subid', $row->WC_SubId);
                echo form_hidden('vendorid', $row->Full_SubId);
                echo form_hidden('aim_lead_number', $row->aim_lead_number);

                echo form_hidden('lead_number', $row->lead_number);
            ?>

            <div id="LeadSource" class="span-10">
                <div class="span-4"><?php echo form_label('Lead Source', 'leadsource'); ?></div>
                <div class="span-4"><p>
                    <?php if (isset($source) && $source == 'FIREBRAND')
                        {
                            echo 'FIREBRAND: You must <b>Update Lead</b> before submitting to schools';
                        }
                    if (isset($source) && $source == 'UNIVERSAL')
                    {
                        echo 'UNIVERSAL: Update Lead Changes before submitting to schools.';
                    }
                ?>
                </p></div>
            </div>

            <div class="span-10">
                <div class="span-4"><?php echo form_label('Lead ID if Available', 'leadid'); ?></div>
                <div class="span-4"><?php if (isset($row->lead_number))
                {
                    echo  "<p>" . $row->lead_number . "</p>";
                }; ?>
                </div>
            </div>

            <div class="span-10">
                <div class="span-4"><?php echo form_label('First Name', 'firstname');?></div>
                <div class="span-4"><?php echo form_input('firstname', $row->first_name);?></div>
            </div>
            <div class="span-10">
                <div class="span-4"><?php echo form_label('Last Name', 'lastname');?></div>
                <div class="span-4"><?php echo form_input('lastname', $row->last_name);?></div>
            </div>
            <div class="span-10">
                <div class="span-4"><?php echo form_label('Street Address', 'streetaddress');?></div>
                <div class="span-4"><?php echo form_input('street', $row->street);?></div>
            </div>
            <div class="span-10">
                <div class="span-4"><?php echo form_label('City', 'city');?></div>
                <div class="span-4"><?php echo form_input('city', $row->city);?></div>
            </div>
            <div class="span-10">
                <div class="span-4"><?php echo form_label('State', 'state');?></div>
                <div class="span-4">
                    <?php
                         $states = array(
                            'AL'=>'ALABAMA',
                            'AK'=>'ALASKA',
                            'AZ'=>'ARIZONA',
                            'AR'=>'ARKANSAS',
                            'CA'=>'CALIFORNIA',
                            'CO'=>'COLORADO',
                            'CT'=>'CONNECTICUT',
                            'DE'=>'DELAWARE',
                            'DC'=>'DISTRICT OF COLUMBIA',
                            'FL'=>'FLORIDA',
                            'GA'=>'GEORGIA',
                            'HA'=>'HAWAII',
                            'ID'=>'IDAHO',
                            'IL'=>'ILLINOIS',
                            'IN'=>'INDIANA',
                            'IA'=>'IOWA',
                            'KS'=>'KANSAS',
                            'KY'=>'KENTUCKY',
                            'LA'=>'LOUISIANA',
                            'ME'=>'MAINE',
                            'MD'=>'MARYLAND',
                            'MA'=>'MASSACHUSETTS',
                            'MI'=>'MICHIGAN',
                            'MN'=>'MINNESOTA',
                            'MS'=>'MISSISSIPPI',
                            'MO'=>'MISSOURI',
                            'MT'=>'MONTANA',
                            'NE'=>'NEBRASKA',
                            'NV'=>'NEVADA',
                            'NH'=>'NEW HAMPSHIRE',
                            'NJ'=>'NEW JERSEY',
                            'NM'=>'NEW MEXICO',
                            'NY'=>'NEW YORK',
                            'NC'=>'NORTH CAROLINA',
                            'ND'=>'NORTH DAKOTA',
                            'OH'=>'OHIO',
                            'OK'=>'OKLAHOMA',
                            'OR'=>'OREGON',
                            'PA'=>'PENNSYLVANIA',
                            'RI'=>'RHODE ISLAND',
                            'SC'=>'SOUTH CAROLINA',
                            'SD'=>'SOUTH DAKOTA',
                            'TN'=>'TENNESSEE',
                            'TX'=>'TEXAS',
                            'UT'=>'UTAH',
                            'VT'=>'VERMONT',
                            'VA'=>'VIRGINIA',
                            'WA'=>'WASHINGTON',
                            'WV'=>'WEST VIRGINIA',
                            'WI'=>'WISCONSIN',
                            'WY'=>'WYOMING');
                        echo form_dropdown('state', $states, $row->state);
                    ?>
                </div>
            </div>
            <div class="span-10">
                <div class="span-4"><?php echo form_label('Zip', 'zip');?></div>
                <div class="span-4"><?php echo form_input('zip', $row->zip); ?></div>

            </div>
            <div class="span-10">
                <div class="span-4"><?php echo form_label('Email Address', 'email');?></div>
                <div class="span-4"><?php echo form_input('email', $row->email);?></div>

            </div>
            <div class="span-10">
                <div class="span-4"><?php echo form_label('4 Digit Graduation Year', 'gradyear');?></div>
                <div class="span-4"><?php echo form_input('gradyear', $row->grad_year);?></div>

            </div>
            <div class="span-10">
                <div class="span-4"><?php echo form_label('10 Digit Telephone', 'phone');?></div>
                <div class="span-4"><?php echo form_input('phone', $row->number);?></div>

            </div>
            <div>
                <div class="span-4"><?php echo form_label('Please select your agent name', 'agent');?></div>
                <div class="span-4">
                    <select name="agent">
            
                <?php if (isset($agents) && count($agents)) : foreach ($agents->result() as $row): ?>

                        <option value="<?=$row->agentid?>"><?=$row->agent_name?></option>


                        <?php endforeach ?>

                <?php endif ?>
                    </select>
                     </div>
            </div>
            <div class="span-10">
                <div class="span-4"><?php echo form_label('Career', 'career');?></div>
                <div class="span-4">
                <?php
                     $careers = array(
                        'BUS'   => 'Business',
                        'CJ'    => 'Criminal Justice',
                        'CUL'   => 'Culinary',
                        'IT'    => 'Info Tech',
                        'MAS'   => 'Massage Therapy',
                        'NURS'  => 'Nursing',
                        'UNK'   => 'Unknown'
                        );

                    echo form_dropdown('career', $careers, $career);
                    ?>
                </div>

                <div id="Disposition" class="span-10">
                <div class="span-4"><?php echo form_label('Disposition', 'disposition');?></div>
                <div class="span-4">
                <?php
                     $disposition = array(
                        'Not Interested In Schools'   => 'Not Interested In Schools',
                        'Call Back 1 Hour'          => 'Call Back 1 Hours',
                        'Call Back 3 Hour'          => 'Call Back 3 Hours',
                        'Call Back 6 Hour'          => 'Call Back 6 Hours',
                        'Call Back 24 Hours'        => 'Call Back 24 Hours',
                        'Call Back 3 Days'          => 'Call Back 3 Days',
                        'Call Back 5 Days'          => 'Call Back 5 Days',
                        'Call Back 1 Week'          => 'Call Back 1 Week',
                        'Call Back 2 Week'          => 'Cakk Back 2 Week',
                        'Call Back 30 Days'         => 'Call Back 30 Days',
                        'Direct Qualified'          => 'Direct Qualified',
                        'Do Not Call'               => 'Do Not Call',
                        'Fake Application'          => 'Fake Application',
                        'Hangup'                    => 'Hangup',
                        'Left Message'              => 'Left Message',
                        'Live Transfer'             => 'Live Transfer',
                        'Machine'                   => 'Machine',
                        'Mort App'                  => 'Mortgage App',
                        'No School In Area'         => 'No School In Area',
                        'Non Qualified'             => 'Non Qualified',
                        'Not Interested'            => 'Not Interested',
                        'Qualified'                 => 'Qualified',
                        'RE Appt'                   => 'RE Appt',
                        'Request Info'              => 'Request Info',
                        'School Already Selected'   => 'School Already Selected',
                        'Spanish Only'              => 'Spanish Only',
                        'Still In High School'      => 'Still In High School',
                        'Transfer Art'              => 'Transfer Art',
                        'Transfer Blink'            => 'Transfer Blink',
                        'Transfer DeVry'            => 'Transfer DeVry',
                        'Wrong Number'              => 'Wrong Number',
                        'NO PARTY CONTACT'          => 'No Party Contact'
                        );


                    echo form_dropdown('disposition', $disposition/*, $row->disposition*/);
                    ?>
                </div>


            </div>

            </div>
            <div class="span-10">
            <?php
                echo form_submit('submit', 'Update Lead');
                echo form_close();
                ?>
            </div>
        </div>
                <!-- END Left Hand Panel -->

            <!-- BEGIN Right Hand Panel -->
            <div class="span-10 last" id="rightpanel">

                <div class="span-10 last" id="PrevSubmission">
                    <h1>Previous Submissions</h1>
                    <?php if (isset($prevsub) && count($prevsub)) : foreach ($prevsub->result() as $row): ?>
                        <div class="span-10">
                            <p><?=$row->school?> on <?=$row->submitted?></p>

                        </div>
                        <?php endforeach; else :?>
                    <?php endif;?>

                </div>



            </div>
            <!-- END Right Hand Panel -->
        <!-- BEGIN Collegebound and CuNet Input -->
        <div class="span-24 clear">

            <div id="accordion" class="span-24 last">
                <h3><a href="#">CollegeBound</a></h3>
                <div>
                    
                    <table class="stripeMe schooltable" id="cbleadoffers">
                        <thead><tr>
                            <th>College or University</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Distance</th>
                            <th>Campus</th>
                            <th>Career/Program</th>
                            <th>Submit to CB</th>
                            <th>Record Your Sale!</th>
                        </tr></thead>
                        <tbody>
                        <?php if (isset($cb_offers) && count($cb_offers)) : foreach ($cb_offers as $row): ?>

                        <tr>
                            <td><?=$row['form_name']?></td>
                            <td><?=$row['city']?></td>
                            <td><?=$row['state']?></td>
                            <td><?=$row['distance']?></td>
                            <td><?=$row['campus']?></td>
                            <td>
                                <?php if (is_array($row['program']))
                                    foreach ($row['program'] as $program_array)
                                        echo $program_array . '<br/>';
                                    else
                                        echo $row['program'];
                                ?>
                            </td>
                            <td>
                                <?php echo '<p><a href="' . $row["link"] . '&client_id=' . $row["@attributes"]["client_id"] . '&id=' . $row["@attributes"]["id"] . '&firstname=' . $first_name . '&lastname=' . $last_name . '&email=' . $email . '&gradyear=' . $grad_year . '&phone=' . $number . '&address1=' . $street . '"><input type="button" value="Submit Lead"></p>'; ?>
                            </td>
                            <td><?php echo form_open_multipart('/callcenter/school_submit/'); ?>

                                <div class="span-4">
                    <select name="agent">

                <?php if (isset($agents) && count($agents)) : foreach ($agents->result() as $agent_row): ?>

                        <option value="<?=$agent_row->agentid?>"><?=$agent_row->agent_name?></option>


                        <?php endforeach ?>

                <?php endif ?>
                    </select>
                     </div>

                                <?php
                                        $data = array(
                                            'lead_number'   => $lead_number,
                                            'network'       => 'cb',
                                            'school'        => $row['form_name'],
                                            'type'          => $row['@attributes']['type'],
                                            'client_id'     => $row['@attributes']['client_id'],
                                            'id'            => $row["@attributes"]["id"],
                                            'link'          => $row['link'],
                                            'source'        => $source,
                                        );
                                    echo form_hidden($data);

                                    echo form_submit('submit', 'Record Lead');
                                    echo form_close();
                                ?>
                            </td>
                        </tr>
                            <?php endforeach; else :?>
                        <?php endif;?>

                    </tbody>
                    </table>
                </div>
                <!-- <h3><a href="#">College Bound Manual Search</a></h3>
                <div>
                    <iframe class="span-22" id="manualsearch" src ="http://affiliate.collegesurfing.com/QualityLeads/index.php?code=<?=$lead_number?>&site_id=<?=urlencode($cb_site_id)?>&zip=<?=urlencode($zip)?>&firstname=<?=urlencode($first_name)?>&lastname=<?=urlencode($last_name)?>&email=<?=urlencode($email)?>&address1=<?=urlencode($street)?>&city=<?=urlencode($city)?>&state=<?=urlencode($state)?>&phone=<?=urlencode($number)?>&gradyear=<?=urlencode($grad_year)?>&career[]=<?=$cb_career_code?>" width="900" scrolling="auto" frameborder="0" height="800"></iframe>


                </div> -->
                <h3><a href="#">CuNet</a></h3>
                <div>     <p>cu career code:<?=$cb_career_code?></p>
                            <p>career:<?=$career?></p>
                    <p>
                    Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis.
                    Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero
                    ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis
                    lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
                    </p>
                    <ul>
                        <li>List item one</li>
                        <li>List item two</li>
                        <li>List item three</li>
                    </ul>
                </div>
                <h3><a href="#">CuNet Manual Search</a></h3>
                <div>
                    <iframe class="span-22" id="manualsearch_cunet" src="http://www.collegeanduniversity.net/index.cfm?event=s.s.go&CID=<?=$cu_cc_submission_id?>&schoolType=2&MainCatID=<?=urlencode($cu_main)?>&<?=$cu_sub_catagory?>&firstname=<?=urlencode($first_name)?>&lastname=<?=urlencode($last_name)?>&address=<?=urlencode($street)?>&city=<?=urlencode($city)?>&state=<?=urlencode($state)?>&email=<?=urlencode($email)?>&daytimePhone=<?=urlencode($number)?>&zip=<?=urlencode($zip)?>&yearhsged=<?=urlencode($grad_year)?>&csrc=<?=urlencode($lead_number)?>" width="900" scrolling="auto" frameborder="0" height="800"></iframe>
                </div>
                <h3><a href="#">HyBrid Ads (Verify Complete Address Before Submission</a></h3>
                <div>
                    <p>
                    Cras dictum. Pellentesque habitant morbi tristique senectus et netus
                    et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
                    faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
                    mauris vel est.
                    </p>
                    <p>
                    Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
                    Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
                    inceptos himenaeos.
                    </p>
                </div>
            </div>
            
        </div>
        </div>


<?php endforeach; else: ?>

        <?php endif; ?>
