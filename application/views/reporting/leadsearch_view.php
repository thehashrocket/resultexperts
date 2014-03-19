<div id="content" class="span-24">

    <div id="menu" class="span-24">
        <ul class="sf-menu">
            <li><a href="/reporting/index">Home</a></li>
            <li><a href="/reporting/reporttool">Leads Reporting Utility</a></li>
            <li><a href="/reporting/leadsearch">Lead Search Utility</a></li>
         </ul>
    </div>

    <div id="LeadSearch" class="span-24">

        <h1>Lead Search Utility</h1>

        <p>This utility will allow the user to search the database for individual leads. Currently you can search using the
        following criteria: First Name, Last Name, and Phone Number</p>


        <?php
            echo form_open_multipart('/reporting/leadsearch');
        ?>

            <p>First Name: <input type="text" name="firstname" id="firstname"> |
            Last Name: <input type="text" name="lastname" id="lastname"> |
            Phone Number: <input type="text" name="phonenumber" id="phonenumber">

            </p>
            <p></p>

        <?php
            echo form_submit('submit', 'Find Leads');
            echo form_close();
        ?>

        <p></p>

    </div>

    <div id="Results" class="span-24">

        <h1>Search Results for First Name: <?=$firstname?> and Last Name: <?=$lastname?> or Phone Number: <?=$phonenumber?></h1>

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
                </tr>


            <?php endforeach; else: ?>

            <?php endif; ?>
         </tbody>
        </table>

    </div>

</div>