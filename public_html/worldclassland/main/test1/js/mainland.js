/************************************************************/
/* TNI World Class #2
/************************************************************/
/* Organization: Thai-Nichi Institute of Technology
/************************************************************/
/* File: mainland.js
/* Author/Developer: Natthasak Vechprasit
/* Design Engineer:  Natthasak Vechprasit
/* Art Director: Yasumin Tamrareang
/*               Thanawat Wanwarothorn
/* Graphic Art:  Yasumin Tamrareang
/*               Amita Chalearmsuk
/************************************************************/
/* Front-End Programmer: Natthasak Vechprasit
/* Back-End Programmer:  Natthasak Vechprasit (System)
/*                       Nat Phattano (Application)
/************************************************************/
/* TangentRoute
/************************************************************/
/* For work with our team please contact
/* E-Mail: ve.natthasak_st@tni.ac.th (Natthasak)
/* Website: tangentroute.com
/************************************************************/

var mountain     = $('#mountain');
var mountainBack = $('#mountain-back');
var screenWidth  = $(window).width();
var mobileScreenMaxWidth = 480;
var isMobileScreen = screenWidth <= mobileScreenMaxWidth;

$(document).ready(function(){
    $('#menu-main').addClass('active');
    mountain.css('left', '-50%');
    //toMainScreen();
});

function showMobileMenu(){
    $('#menu-mobile').css('margin-top', '0');
    $('#img-logo-mobile').attr('onclick', 'hideMobileMenu()');
}

function hideMobileMenu(){
    $('#menu-mobile').css('margin-top', '-265px');
    $('#img-logo-mobile').attr('onclick', 'showMobileMenu()');
}

// Screen -2
function toGalleryScreen(){

    /**
     * Activate menu
     */
    removeActiveMenu();
    $('#menu-gallery').addClass('active');

    /**
     * Close Information popup
     */
    closeAllPopup();

    /**
     * Animate Mountain, Parallax Effect
     */
    mountain.css('left', '-10%');
    mountainBack.css('left', '-30%');

    /**
     * Left Screen
     * Set right to 90% to let the island display on right hand side of the screen
     */
    // Nothing there

    /**
     * Focus Screen
     * Center Element
     * margin: auto; // set on css file
     * Remove left and right attribute
     * left and right are set to 0 by css file
     */
    $('#island-gallery').css('right', '25%');

    /**
     * Right Screen
     * Set 'right' of center island to -120% and unset 'left' to let the island display on left hand side of the screen
     * Set 'left' of left side island to 150% to let the island disappear from main screen and locate on the left hand side
     */
    $('#island-schedule').css('right', '-40%');
    $('#island-main').css('right', '-300%');
    $('#island-main').css('left', '');
    $('#island-faq').css('left', '300%');
    $('#island-contact').css('left', '400%');


    $('#island-main').attr('onclick', 'toMainScreen()');
    $('#island-schedule').attr('onclick', 'toScheduleScreen()');
}

// Screen -1
function toScheduleScreen(){

    /**
     * Activate menu
     */
    removeActiveMenu();
    $('#menu-schedule').addClass('active');

    /**
     * Close Information popup
     */
    closeAllPopup();

    /**
     * Animate Mountain, Parallax Effect
     */
    mountain.css('left', '-30%');
    mountainBack.css('left', '-40%');

    /**
     * Left Screen
     * Set right to 90% to let the island display on right hand side of the screen
     */
     $('#island-gallery').css('right', '90%');

    /**
     * Focus Screen
     * Center Element
     * margin: auto; // set on css file
     * Remove left and right attribute
     * left and right are set to 0 by css file
     */
    $('#island-schedule').css('right', '25%');

    if(isMobileScreen){
        $('#island-schedule').css('right', '0');
    }

    /**
     * Right Screen
     * Set 'right' of center island to -120% and unset 'left' to let the island display on left hand side of the screen
     * Set 'left' of left side island to 150% to let the island disappear from main screen and locate on the left hand side
     */
    $('#island-main').css('right', '-120%');
    $('#island-main').css('left', '');
    $('#island-faq').css('left', '150%');
    $('#island-contact').css('left', '225%');

    if(isMobileScreen){
        $('#island-faq').css('left', '225%');
        $('#island-main').css('right', '-200%');
    }



    $('#island-main').attr('onclick', 'toMainScreen()');
    $('#island-schedule').attr('onclick', 'showSchedule(true)');

}

// Screen 0
function toMainScreen(){

    /**
     * Activate menu
     */
    removeActiveMenu();
    $('#menu-main').addClass('active');

    /**
     * Close Information popup
     */
    closeAllPopup();

    /**
     * Animate Mountain, Parallax Effect
     */
    mountain.css('left', '-50%');
    mountainBack.css('left', '-50%');

    /**
     * Left Screen
     * Set right: 90% to let the island display on right hand side of the screen
     */
    $('#island-schedule').css('right', '90%');
    $('#island-gallery').css('right', '150%');

    if(isMobileScreen){
        $('#island-schedule').css('right', '100%');
        $('#island-gallery').css('right', '200%');
    }

    /**
     * Focus Screen
     * Center Element
     * margin: auto; // set on css file
     * Remove left and right attribute
     * left and right are set to 0 by css file
     */
    $('#island-main').css('left', '');
    $('#island-main').css('right', '');

    /**
     * Right Screen
     * Set left: 90% to let the island display on right hand side of the screen
     */
    $('#island-faq').css('left', '90%');
    $('#island-faq').css('right', '');
    $('#island-contact').css('left', '200%');

    if(isMobileScreen){
        $('#island-faq').css('left', '100%');
        $('#island-faq').css('right', '');
        $('#island-contact').css('left', '200%');
    }

    /**
     * Change onclick attribute
     */
    $('#island-schedule').attr('onclick', 'toScheduleScreen()');
    $('#island-faq').attr('onclick', 'toFAQScreen()');
}

// Screen 1
function toFAQScreen(){
    /**
     * Activate menu
     */
    removeActiveMenu();
    $('#menu-faq').addClass('active');

    /**
     * Close Information popup
     */
    closeAllPopup();

    /**
     * Animate Mountain, Parallax Effect
     */
    mountain.css('left', '-70%');
    mountainBack.css('left', '-60%');

    /**
     * Left Screen
     * Set 'left' of center island to -120% and unset 'right' to let the island display on left hand side of the screen
     * Set 'right' of left side island to 150% to let the island disappear from main screen and locate on the left hand side
     */
    $('#island-gallery').css('right', '300%');
    $('#island-main').css('left', '-120%');
    $('#island-main').css('right', '');
    $('#island-schedule').css('right', '150%');

    if(isMobileScreen){
    $('#island-schedule').css('right', '225%');
        $('#island-main').css('left', '-200%');
        $('#island-faq').css('right', '');
        $('#island-contact').css('left', '-200%');
    }

    /**
     * Focus Screen
     * Center Element
     * Set left and right to 25%
     */
    $('#island-faq').css('left', '25%');
    $('#island-faq').css('right', '25%');

    if(isMobileScreen){
        $('#island-faq').css('left', '0');
        $('#island-faq').css('right', '0');
    }

    /**
     * Right Screen
     * Set left to 90% to let the island display on right hand side of the screen
     */
    $('#island-contact').css('left', '90%');

    if(isMobileScreen){
        $('#island-contact').css('left', '100%');
        $('#island-contact').css('right', '');
    }

    /**
     * Change onclick attribute
     */
    $('#island-main').attr('onclick', 'toMainScreen()');
    $('#island-faq').attr('onclick', 'showFAQ(true)');
    $('#island-contact').attr('onclick', 'toContactScreen()');
}

// Screen 2
function toContactScreen(){
    /**
     * Activate menu
     */
    removeActiveMenu();
    $('#menu-faq').addClass('active');

    /**
     * Close Information popup
     */
    closeAllPopup();

    /**
     * Animate Mountain, Parallax Effect
     */
    mountain.css('left', '-90%');
    mountainBack.css('left', '-70%');

    /**
     * Left Screen
     * Set 'left' of center island to -120% and unset 'right' to let the island display on left hand side of the screen
     * Set 'right' of left side island to 150% to let the island disappear from main screen and locate on the left hand side
     */
    $('#island-gallery').css('right', '400%');
    $('#island-schedule').css('right', '300%');
    $('#island-main').css('left', '-300%');
    $('#island-main').css('right', '');
    $('#island-faq').css('left', '-40%');

    /**
     * Focus Screen
     * Center Element
     * Set left and right to 25%
     */
    $('#island-contact').css('left', '25%');

    /**
     * Right Screen
     * Set left to 90% to let the island display on right hand side of the screen
     */
    // No code here...

    /**
     * Change onclick attribute
     */
    $('#island-faq').attr('onclick', 'toFAQScreen()');
    $('#island-contact').attr('onclick', 'showContact(true)');
}

function removeActiveMenu(){
    $('.menu-items').removeClass('active');
}

function closeAllPopup(){
    wtfIsThis(false);
    showFAQ(false);
    showSchedule(false);
}

/**
 * Information: WTF-IS-THIS
 * Screen: Main
 */
function wtfIsThis(shit){
    if(shit){
        $('#island-main').css('bottom', '-45%');

        $('#popup-main').css('visibility', 'visible')
        $('#popup-main').css('bottom', '32%');
        $('#popup-main').css('opacity', '1');

        $('#island-main').attr('onclick', 'wtfIsThis(false)');
    }
    else{
        $('#island-main').css('bottom', '');

        $('#popup-main').css('visibility', 'hidden');
        $('#popup-main').css('bottom', '');
        $('#popup-main').css('opacity', '');

        $('#island-main').attr('onclick', 'wtfIsThis(true)');
    }
}

/**
 * Information: Frequently Asked Question (FAQ)
 * Screen: FAQ
 */
function showFAQ(problem){
    if(problem){
        $('#island-faq').css('bottom', '-40%').attr('onclick', 'showFAQ(false)');
        $('#popup-faq').css('visibility', 'visible').css('bottom', '20%').css('opacity', '1');
    }
    else{
        $('#island-faq').css('bottom', '').attr('onclick', 'showFAQ(true)');
        $('#popup-faq').css('visibility', 'hidden').css('bottom', '').css('opacity', '');
    }
}

/**
 * Information: Schedule
 * Screen: Schedule
 */
function showSchedule(wantToLook){
    if(wantToLook){
        $('#island-schedule').css('bottom', '-40%').attr('onclick', 'showSchedule(false)');
        $('#popup-schedule').css('visibility', 'visible').css('bottom', '40%').css('opacity', '1');
    }
    else{
        $('#island-schedule').css('bottom', '').attr('onclick', 'showSchedule(true)');
        $('#popup-schedule').css('visibility', 'hidden').css('bottom', '').css('opacity', '');
    }
}

function showContact(getInTouch){
    if(getInTouch){
        $('#island-contact').css('bottom', '-40%').attr('onclick', 'showContact(false)');
        $('#popup-contact').css('visibility', 'visible').css('bottom', '40%').css('opacity', '1');
    }
    else{
        $('#island-contact').css('bottom', '').attr('onclick', 'showContact(true)');
        $('#popup-contact').css('visibility', 'hidden').css('bottom', '').css('opacity', '');
    }
}
