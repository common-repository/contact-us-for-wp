<?php
/**
 * Contact Us settings page is in this file.
 *
 * @package    Contactuswp
 * @subpackage Contactuswp/admin
 * @author     Sana Azmeh <hello@contactuswp.com>
 * @link       https://contactuswp.com
 *
 */


add_action('admin_menu', 'Contactuswp_Settings_page');

/**
 * Function to add options page in WP dashboard > settings tab.
 *
 * @return void
 */
function Contactuswp_Settings_page()
{
    add_options_page(
        'Contact Us for WP',
        'Contact Us for WP',
        'manage_options',
        'contactuswp-options',
        'Contactuswp_Options_page'
    );
}

add_action('admin_init', 'Contactuswp_Settings_init');

/**
 * Function to define settings fields in the options page
 *
 * @return void
 */
function Contactuswp_Settings_init()
{

    $arg = array('type'=>'array');

    register_setting('contactuswp', 'contactuswp_form_options', $arg);
    register_setting('contactuswp', 'contactuswp_icon_direction', $arg);
    register_setting('contactuswp', 'contactuswp_icon_shape', $arg);
    register_setting('contactuswp', 'contactuswp_icon_color', $arg);
    register_setting('contactuswp', 'contactuswp_form_labels', $arg);
    register_setting('contactuswp', 'contactuswp_send_to_email', $arg);
   
    /**
     *  Form section - default or shortcode
     */
    add_settings_section(
        'contactuswp_form_section',
        __('Contact Us Form', 'contactuswp'),
        'Contactuswp_Form_Section_callback',
        'contactuswp'
    );

    add_settings_field(
        'contactuswp_default_form_checkbox',
        __('Use Default Form', 'contactuswp'),
        'Contactuswp_Default_Form_render',
        'contactuswp',
        'contactuswp_form_section'
    );
    add_settings_field(
        'contactuswp_form_shortcode_txt',
        __('Use Shortcode', 'contactuswp'),
        'Contactuswp_Form_Shortcode_render',
        'contactuswp',
        'contactuswp_form_section'
    );

    /**
     * Form labels section
     */
    add_settings_section(
        'contactuswp_formsettings_section',
        __('Title and Labels', 'contactuswp'),
        'Contactuswp_Formsettings_Section_callback',
        'contactuswp'
    );

    add_settings_field(
        'contactuswp_title_txt',
        __('Contact Us Title', 'contactuswp'),
        'Contactuswp_Title_render',
        'contactuswp',
        'contactuswp_formsettings_section'
    );
    add_settings_field(
        'contactuswp_name_label_txt',
        __('Name Field Label', 'contactuswp'),
        'Contactuswp_Name_Label_render',
        'contactuswp',
        'contactuswp_formsettings_section'
    );
    add_settings_field(
        'contactuswp_email_label_txt',
        __('Email Field Label', 'contactuswp'),
        'Contactuswp_Email_Label_render',
        'contactuswp',
        'contactuswp_formsettings_section'
    );
    add_settings_field(
        'contactuswp_subject_label_txt',
        __('Subject Field Label', 'contactuswp'),
        'Contactuswp_Subject_Label_render',
        'contactuswp',
        'contactuswp_formsettings_section'
    );
    add_settings_field(
        'contactuswp_phone_label_txt',
        __('Phone Field Label', 'contactuswp'),
        'Contactuswp_Phone_Label_render',
        'contactuswp',
        'contactuswp_formsettings_section'
    );
    add_settings_field(
        'contactuswp_message_label_txt',
        __('Message Field Label', 'contactuswp'),
        'Contactuswp_Message_Label_render',
        'contactuswp',
        'contactuswp_formsettings_section'
    );
    add_settings_field(
        'contactuswp_message_submission_txt',
        __('After Submission Message', 'contactuswp'),
        'Contactuswp_Message_Submission_render',
        'contactuswp',
        'contactuswp_formsettings_section'
    );
    add_settings_field(
        'contactuswp_send_autoreply_checkbox',
        __('Send Autoreply Email', 'contactuswp'),
        'Contactuswp_Send_Autoreply_render',
        'contactuswp',
        'contactuswp_formsettings_section'
    );
    add_settings_field(
        'contactuswp_phone_field_checkbox',
        __('Show Phone Field', 'contactuswp'),
        'Contactuswp_Show_Phone_render',
        'contactuswp',
        'contactuswp_formsettings_section'
    );

    /**
     * Contact us button settings section
     */
    add_settings_section(
        'contactuswp_settings_section',
        __('Options', 'contactuswp'),
        'Contactuswp_Settings_Section_callback',
        'contactuswp'
    );
    add_settings_field(
        'contactuswp_icon_color_txt',
        __('Icon Background Color', 'contactuswp'),
        'Contactuswp_Icon_Color_render',
        'contactuswp',
        'contactuswp_settings_section'
    );
    add_settings_field(
        'contactuswp_icon_text_color_txt',
        __('Icon Text Color', 'contactuswp'),
        'Contactuswp_Icon_Text_Color_render',
        'contactuswp',
        'contactuswp_settings_section'
    );
    add_settings_field(
        'contactuswp_icon_hovercolor_txt',
        __('Icon Background Hover Color', 'contactuswp'),
        'Contactuswp_Icon_Hovercolor_render',
        'contactuswp',
        'contactuswp_settings_section'
    );
    add_settings_field(
        'contactuswp_icon_text_hovercolor_txt',
        __('Icon Text Hover Color', 'contactuswp'),
        'Contactuswp_Icon_Text_Hovercolor_render',
        'contactuswp',
        'contactuswp_settings_section'
    );

    add_settings_field(
        'contactuswp_icon_direction_slct',
        __('Icon Direction', 'contactuswp'),
        'Contactuswp_Icon_Direction_render',
        'contactuswp',
        'contactuswp_settings_section'
    );
    add_settings_field(
        'contactuswp_icon_shape_slct',
        __('Icon Shape', 'contactuswp'),
        'Contactuswp_Icon_Shape_render',
        'contactuswp',
        'contactuswp_settings_section'
    );

    // email settings section
    add_settings_section(
        'contactuswp_email_section',
        __('Recipient Email', 'contactuswp'),
        'Contactuswp_Email_Section_callback',
        'contactuswp'
    );
    add_settings_field(
        'contactuswp_send_to_email_txt',
        __('Send to email', 'contactuswp'),
        'Contactuswp_Send_To_Email_render',
        'contactuswp',
        'contactuswp_email_section'
    );
}

/**
 * Function to display default form checkbox field
 *
 * @return echo checkbox
 */
function Contactuswp_Default_Form_render()
{
    $options = get_option('contactuswp_form_options');
    ?>
    <input type='checkbox' 
    name='contactuswp_form_options[contactuswp_default_form_checkbox]' 
    value='1' 
    <?php echo (($options['contactuswp_default_form_checkbox'] ??
         '0') == '1') ? 'checked' : ''; ?> >
    <?php
}

/**
 * A Function to display text field for form shortcode
 *
 * @return echo text field for form shortcode
 */
function Contactuswp_Form_Shortcode_render()
{
    $options = get_option('contactuswp_form_options');
    ?>
    <input type='text' 
    name='contactuswp_form_options[contactuswp_form_shortcode_txt]' 
    value='<?php echo $options['contactuswp_form_shortcode_txt'] ?? ''; ?>' 
    maxlength=200 style="width:350px">
    <?php
}

/**
 * A function to display title text field
 *
 * @return echo text field for title
 */
function Contactuswp_Title_render()
{
    $options = get_option('contactuswp_form_labels');
    ?>
    <input type='text' 
    name='contactuswp_form_labels[contactuswp_title_txt]' 
    value='<?php echo $options['contactuswp_title_txt'] ?? ''; ?>' 
    maxlength=35 style="width:350px">
    <?php
}

/**
 * A function to display text field for name label
 *
 * @return echo text field for name
 */
function Contactuswp_Name_Label_render()
{
    $options = get_option('contactuswp_form_labels');
    ?>
    <input type='text' 
    name='contactuswp_form_labels[contactuswp_name_label_txt]'
     value='<?php echo $options['contactuswp_name_label_txt'] ?? ''; ?>' 
     maxlength=150 style="width:350px">
    <?php
}

/**
 * A function to display text field for email label
 *
 * @return echo text field for email label
 */
function Contactuswp_Email_Label_render()
{
    $options = get_option('contactuswp_form_labels');
    ?>
    <input type='text' 
    name='contactuswp_form_labels[contactuswp_email_label_txt]' 
    value='<?php echo $options['contactuswp_email_label_txt'] ?? ''; ?>' 
    maxlength=150 style="width:350px">
    <?php
}

/**
 * A function to display text field for subject label
 *
 * @return echo text field for subject label
 */
function Contactuswp_Subject_Label_render()
{
    $options = get_option('contactuswp_form_labels');
    ?>
    <input type='text' 
    name='contactuswp_form_labels[contactuswp_subject_label_txt]' 
    value='<?php echo $options['contactuswp_subject_label_txt'] ?? ''; ?>' 
    maxlength=150 style="width:350px">
    <?php
}
/**
 * A function to display text field for phone label
 *
 * @return echo text field for phone label
 */
function Contactuswp_Phone_Label_render()
{
    $options = get_option('contactuswp_form_labels');
    ?>
    <input type='text' 
    name='contactuswp_form_labels[contactuswp_phone_label_txt]' 
    value='<?php echo $options['contactuswp_phone_label_txt'] ?? ''; ?>' 
    maxlength=150 style="width:350px">
    <?php
}

/**
 * A function to display text field for message label
 *
 * @return echo text field for message label
 */
function Contactuswp_Message_Label_render()
{
    $options = get_option('contactuswp_form_labels');
    ?>
    <input type='text' 
    name='contactuswp_form_labels[contactuswp_message_label_txt]' 
    value='<?php echo $options['contactuswp_message_label_txt'] ?? ''; ?>' 
    maxlength=150 style="width:350px">
    <?php
}

/**
 * A function to display textarea field for meesage submission notice
 *
 * @return echo textarea field for meesage submission notice
 */
function Contactuswp_Message_Submission_render()
{
    $options = get_option('contactuswp_form_labels');
    ?>
    <TEXTAREA name='contactuswp_form_labels[contactuswp_message_submission_txt]'  
    maxlength=300 style="width:350px" rows="3"><?php echo $options['contactuswp_message_submission_txt'] ?? ''; ?></TEXTAREA>
    <?php
}

/**
 * Function to display send autoreply checkbox field
 *
 * @return echo checkbox
 */
function Contactuswp_Send_Autoreply_render()
{
    $options = get_option('contactuswp_form_labels');
    ?>
    <input type='checkbox' 
    name='contactuswp_form_labels[contactuswp_send_autoreply_checkbox]' 
    value='1' 
    <?php echo ( ($options['contactuswp_send_autoreply_checkbox'] ??
         '0') == '1')?'checked':''; ?> >
    <?php
}
/**
 * Function to display phone checkbox 
 *
 * @return echo checkbox
 */
function Contactuswp_Show_Phone_render()
{
    $options = get_option('contactuswp_form_labels');
    ?>
    <input type='checkbox' 
    name='contactuswp_form_labels[contactuswp_phone_field_checkbox]' 
    value='1' 
    <?php echo ( ($options['contactuswp_phone_field_checkbox'] ??
         '0') == '1')?'checked':''; ?> >
    <?php
}


/**
 * A function to display color field for selecting icon color
 *
 * @return echo color field for selecting icon color
 */
function Contactuswp_Icon_Color_render()
{
    $options = get_option('contactuswp_icon_color');
    $color= $options['contactuswp_icon_color_txt'] ?? "#2ACCE5";
    ?>
    <input type='color' 
    name='contactuswp_icon_color[contactuswp_icon_color_txt]' 
    value='<?php echo $color; ?>' 
    maxlength=20> Default: #2ACCE5
    <?php
}

/**
 * A function to display color field for selecting icon color on hover
 *
 * @return echo color field for selecting icon color on hover
 */
function Contactuswp_Icon_Hovercolor_render()
{
    $options = get_option('contactuswp_icon_color');
    $color = $options['contactuswp_icon_hovercolor_txt'] ?? "#333333";
    ?>
    <input type='color' 
    name='contactuswp_icon_color[contactuswp_icon_hovercolor_txt]' 
    value='<?php echo $color; ?>' 
    maxlength=20> Default: #333333
    <?php
}

/**
 * A function to display color field for selecting icon text color
 *
 * @return echo color field for selecting icon text color
 */
function Contactuswp_Icon_Text_Color_render()
{
    $options = get_option('contactuswp_icon_color');
    $color = $options['contactuswp_icon_text_color_txt'] ?? "#ffffff";
    ?>
    <input type='color' 
    name='contactuswp_icon_color[contactuswp_icon_text_color_txt]' 
    value='<?php echo $color; ?>' 
    maxlength=20> Default: #ffffff
    <?php
}

/**
 * A function to display color field for selecting icon text color on hover
 *
 * @return echo color field for selecting icon text color on hover
 */
function Contactuswp_Icon_Text_Hovercolor_render()
{
    $options = get_option('contactuswp_icon_color');
    $color = $options['contactuswp_icon_text_hovercolor_txt'] ?? '#ffffff';
    ?>
    <input type='color' 

    name='contactuswp_icon_color[contactuswp_icon_text_hovercolor_txt]' 

    value='<?php echo $color; ?>' 

    maxlength=20> Default: #ffffff
    <?php
}

/**
 * A function to display option field for selecting icon direction: left or right
 *
 * @return echo option field for selecting icon direction
 */
function Contactuswp_Icon_Direction_render()
{
    $options = get_option('contactuswp_icon_direction');
    ?>
    <select name='contactuswp_icon_direction[contactuswp_icon_direction_slct]'>
        <option value='left' 
        <?php selected($options['contactuswp_icon_direction_slct']??'', 'left'); ?>
        >Left</option>
        <option value='right' 
        <?php selected($options['contactuswp_icon_direction_slct']??'', 'right'); ?>
        >Right</option>
    </select>

    <?php
}

/**
 * A function to display option field for selecting icon shape: round or square
 *
 * @return echo option field for selecting icon shape
 */
function Contactuswp_Icon_Shape_render()
{
    $options = get_option('contactuswp_icon_shape');
    ?>
    <select name='contactuswp_icon_shape[contactuswp_icon_shape_slct]'>
        <option value='round' 
        <?php selected($options['contactuswp_icon_shape_slct']??'', 'round'); ?>
        >Round</option>
        <option value='square' 
        <?php selected($options['contactuswp_icon_shape_slct']??'', 'square'); ?>
        >Square</option>
    </select>

    <?php
}

/**
 * A function to display email field for entering recipient email
 *
 * @return echo email field for entering recipient email
 */
function Contactuswp_Send_To_Email_render()
{
    $options = get_option('contactuswp_send_to_email');
    ?>
    <input type='email' 
    name='contactuswp_send_to_email[contactuswp_send_to_email_txt]' 
    value='<?php echo $options['contactuswp_send_to_email_txt']??''; ?>' 
    style="width:300px" maxlength=350>
    <?php
}

/**
 * A function to display form shortcode section title
 *
 * @return echo title
 */
function Contactuswp_Form_Section_callback()
{
     echo __('Set form shortcode', 'contactuswp');
}

/**
 * A function to display form settings section title
 *
 * @return echo title
 */
function Contactuswp_Formsettings_Section_callback()
{
    echo __('Set Contact Us title and labels', 'contactuswp');
}

/**
 * A function to display icon settings title
 *
 * @return echo title
 */
function Contactuswp_Settings_Section_callback()
{
    echo __('Set Contact Us icon options', 'contactuswp');
}

/**
 * A function to display email section title
 *
 * @return echo title
 */
function Contactuswp_Email_Section_callback()
{
    echo __('Set recipient email address', 'contactuswp');
}

/**
 * A function to display options form and fields.
 *
 * @return echo form
 */
function Contactuswp_Options_page()
{
    ?>
    <form action='options.php' method='post'>

        <h2><?php echo esc_html(get_admin_page_title()); ?></h2>

        <?php
        settings_fields('contactuswp');
        do_settings_sections('contactuswp');
        submit_button();
        ?>

    </form>
    <?php
}