<?php
/**
 * l-d-tool-test Theme Customizer
 *
 * @package l-d-tool-test
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function l_d_tool_test_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector' => '.site-title a',
            'render_callback' => 'l_d_tool_test_customize_partial_blogname',
        ));
        $wp_customize->selective_refresh->add_partial('blogdescription', array(
            'selector' => '.site-description',
            'render_callback' => 'l_d_tool_test_customize_partial_blogdescription',
        ));
    }


    //Add settings for contact information
    $wp_customize->add_section('contact_information', array(
        'title' => __('Settings for contact information', 'l_d_tool_test'),
        'priority' => 20,
    ));

    //Add settings for the phone number
    //Label
    $wp_customize->add_setting('phone_label', array(
        'default' => __('Label for phone number', 'l_d_tool_test'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('phone_label', array(
        'label' => __('Phone number settings', 'l_d_tool_test'),
        'section' => 'contact_information',
        'settings' => 'phone_label',
        'type' => 'text',
    ));

    //Value
    $wp_customize->add_setting('phone_number', array(
        'default' => __('Phone number', 'l_d_tool_test'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('phone_number', array(
        'label' => __('Phone number settings', 'l_d_tool_test'),
        'section' => 'contact_information',
        'settings' => 'phone_number',
        'type' => 'text',
    ));

    //Add settings for email
    //Label
    $wp_customize->add_setting('email_label', array(
        'default' => __('Label for email', 'l_d_tool_test'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('email_label', array(
        'label' => __('Settings for the email label', 'l_d_tool_test'),
        'section' => 'contact_information',
        'settings' => 'email_label',
        'type' => 'text',
    ));

    //Value
    $wp_customize->add_setting('email_value', array(
        'default' => __('Email', 'l_d_tool_test'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('email_value', array(
        'label' => __('Settings for email value', 'l_d_tool_test'),
        'section' => 'contact_information',
        'settings' => 'email_value',
        'type' => 'text',
    ));

    //Add settings for Button - "Get a quote"
    $wp_customize->add_setting('get_button', array(
        'default' => __('Label for button', 'l_d_tool_test'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('get_button', array(
        'label' => __('Title for button', 'l_d_tool_test'),
        'section' => 'contact_information',
        'settings' => 'get_button',
        'type' => 'text',
    ));

    $wp_customize->add_setting('url_get_button', array(
        'default' => __('Url for button', 'l_d_tool_test'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('url_get_button', array(
        'label' => __('Url for donate button', 'l_d_tool_test'),
        'section' => 'contact_information',
        'settings' => 'url_get_button',
        'type' => 'url',
    ));

    $wp_customize->add_setting('button_display', array(
        'default' => true,
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('button_display', array(
        'label' => 'Button Display',
        'section' => 'contact_information',
        'settings' => 'button_display',
        'type' => 'radio',
        'choices' => array(
            'show' => 'Show Button',
            'hide' => 'Hide Button',
        ),
    ));

    //Add settings for the main Banner
    $wp_customize->add_section('banner', array(
        'title' => __('Settings for the main banner ', 'l_d_tool_test'),
        'priority' => 21,
    ));

    //Company logo
    $wp_customize->add_setting('banner-logo');
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'banner-logo',
            array(
                'label' => 'Company logo',
                'section' => 'banner',
                'settings' => 'banner-logo'
            )
        )
    );

    //The company's slogan
    $wp_customize->add_setting('slogan', array(
        'default' => __('The company\'s slogan', 'l_d_tool_test'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('slogan', array(
        'label' => __('The company\'s slogan', 'l_d_tool_test'),
        'section' => 'banner',
        'settings' => 'slogan',
        'type' => 'text',
    ));

    //Site description
    $wp_customize->add_setting('site_description', array(
        'default' => __('Description of the site', 'l_d_tool_test'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('site_description', array(
        'label' => __('Description of the site', 'l_d_tool_test'),
        'section' => 'banner',
        'settings' => 'site_description',
        'type' => 'textarea',
    ));

    //Add settings for the banner background
    $wp_customize->add_setting('banner_background', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'banner_background', array(
        'label' => __('Background image of the banner', 'l_d_tool_test'),
        'section' => 'banner',
        'type' => 'background',
    )));

}

add_action('customize_register', 'l_d_tool_test_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function l_d_tool_test_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function l_d_tool_test_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function l_d_tool_test_customize_preview_js()
{
    wp_enqueue_script('l-d-tool-test-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20151215', true);
}

add_action('customize_preview_init', 'l_d_tool_test_customize_preview_js');
