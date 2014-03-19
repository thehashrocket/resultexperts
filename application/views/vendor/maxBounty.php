
    <div class="span-24">
        <h1>MaxBounty Vendor Lead Entry Form</h1>
    </div>

    <div class="span-18">
        <div class="span-10">
            <?php echo validation_errors('<div class="error">', '</div>'); ?>
            <?php
                if (isset($error_message))
        {
            echo '<div class="error"><p>' . $error_message . '</p></div>';
        }
            if (isset($success_message))
        {
            echo '<div class="notice"><p>' . $success_message . '</p></div>';
        }
             ?>

        </div>


    <div class="span-10">
        <?php
            echo form_open_multipart('/vendor/lead_post/');
            echo form_hidden('vendorid', $vendorid);
            echo form_hidden('aim_lead_number', $aim_lead_number);
            echo form_hidden('notes', $notes);
            echo form_hidden('redirect', $redirect);
            echo form_hidden('subid', $subid); ?>

        <div class="span-10">
            <div class="span-4"><?php echo form_label('First Name', 'firstname'); ?></div>
            <div class="span-4"><?php echo form_input('firstname', 'First Name'); ?></div>

        </div>
        <div class="span-10">
            <div class="span-4"><?php echo form_label('Last Name', 'lastname'); ?></div>
            <div class="span-4"><?php echo form_input('lastname', 'Last Name'); ?></div>
        </div>
        <div class="span-10">
            <div class="span-4"><?php echo form_label('Street Address', 'streetaddress'); ?></div>
            <div class="span-4"><?php echo form_input('street', 'Street Address'); ?></div>

        </div>
        <div class="span-10">
            <div class="span-4"><?php echo form_label('City', 'city'); ?></div>
            <div class="span-4"><?php echo form_input('city', 'City');?></div>

        </div>
        <div class="span-10">
            <div class="span-4"><?php echo form_label('State', 'state');?></div>
            <div class="span-4"><?php echo form_dropdown('state',$states, '');?></div>

        </div>
        <div class="span-10">
            <div class="span-4"><?php echo form_label('Zip', 'zip');?></div>
            <div class="span-4"><?php echo form_input('zip', 'Zip');?></div>

        </div>
        <div class="span-10">
            <div class="span-4"><?php echo form_label('Email Address', 'email');?></div>
            <div class="span-4"><?php echo form_input('email', 'Email');?></div>

        </div>
        <div class="span-10">
            <div class="span-4"><?php echo form_label('4 Digit Graduation Year', 'gradyear');?></div>
            <div class="span-4"><?php echo form_input('gradyear', '4 Digit Year');?></div>

        </div>
        <div class="span-10">
            <div class="span-4"><?php echo form_label('10 Digit Telephone', 'phone');?></div>
            <div class="span-4"><?php echo form_input('phone', 'Telephone');?></div>

        </div>
        <div class="span-10">
            <div class="span-4"><?php echo form_label('Career', 'career');?></div>
            <div class="span-4"><?php echo form_dropdown('career',$careers, '');?></div>

        </div>
        <div class="span-10">
            <div class="span-4"><?php echo form_submit('submit', 'Submit Lead');?></div>
        <?php echo form_close(); ?>
        </div>
    </div>
</div>