    <script>
        $(function() {
            $( "#startdate" ).datepicker({ dateFormat: 'yy-mm-dd' });
            $( "#enddate" ).datepicker({ dateFormat: 'yy-mm-dd' });
        });
        $(document).ready(function()
    {
        $("#myTable").tablesorter();
    }
);
	</script>
 
<div id="content" class="span-24">

    <div id="menu" class="span-24">
        <ul class="sf-menu">
            <li><a href="/reporting/index">Home</a></li>
            <li><a href="/reporting/reporttool">Leads Reporting Utility</a></li>
            <li><a href="/reporting/leadsearch">Lead Search Utility</a></li>
         </ul>
    </div>

    <div id="LeadSearch" class="span-24">

        <h1>Lead Reporting Utility</h1>

        <p>This utility will allow the user to search the database for leads. Currently you can search using the
        following criteria: Start Date, End Date, Disposition.</p>
        <p class="notice">When searching by date, if you want to <strong>include today</strong> you must choose
        tomorrow's date as the end date. That will allow you to cover the entire current day.</p>

        <?php
            echo form_open_multipart('/reporting/reporttool');
        ?>

            <p>Start Date: <input type="text" name="startdate" id="startdate"> |
            End Date: <input type="text" name="enddate" id="enddate"> |
                Disposition: <?php
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
                        'No Party Contact'          => 'No Party Contact',
                        'NULL'                      => 'No Data',
                        'ALL'                       => 'All',
                        'ALLNotQualified'           => 'All Except Qualified'
                        );


                    echo form_dropdown('disposition', $disposition/*, $row->disposition*/);
                    ?>
            </p>
            <p></p>

        <?php
            echo form_submit('submit', 'Find Leads');
            echo form_close();
        ?>

        <p><?php
            echo form_open_multipart('/reporting/make_report_file');
            echo form_submit('submit', 'makefile');
            echo form_close();
        ?></p>

    </div>

    <div id="Results" class="span-24">

        <h1>Search Results for  <?=$start?> through <?=$end?>. Lead Status: <?=$leadstatus?></h1>

        <table id="myTable" class="stripeMe schooltable">
            <tbody>
            <thead>
                <th>Lead Number</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Career</th>
                <th>Disposition</th>
                <th>Vendor</th>
            </thead>

            <?php if (isset($results) && count($results)) : foreach ($results->result() as $row): ?>

                <tr>
                    <td><a href="http://resultexperts.com/callcenter?source=universal&uid=<?=$row->lead_number?>"><?=$row->lead_number?></a> </td>
                    <td><?=$row->first_name?></td>
                    <td><?=$row->last_name?></td>
                    <td><?=$row->email?></td>
                    <td><?=$row->number?></td>
                    <td><?=$row->career?></td>
                    <td><?=$row->disposition?></td>
                    <td><?=$row->aim_lead_number?></td>
                </tr>


            <?php endforeach; else: ?>

            <?php endif; ?>
         </tbody>
        </table>

    </div>

</div>