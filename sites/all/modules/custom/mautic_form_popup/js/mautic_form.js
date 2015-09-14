/** This section is only needed once per page if manually copying **/
if (typeof MauticSDKLoaded == 'undefined') {
    var MauticSDKLoaded = true;
    var head            = document.getElementsByTagName('head')[0];
    var script          = document.createElement('script');
    script.type         = 'text/javascript';
    script.src          = 'http://leads.redcrackle.com/media/js/mautic-form.js';
    script.onload       = function() {
        MauticSDK.onLoad();
    };
    head.appendChild(script);
    var MauticDomain = 'http://leads.redcrackle.com';
    var MauticLang   = {
        'submittingMessage': "Please wait..."
    };
    var MauticFormValidations  = {};
    var MauticFormCallback = {};
}

/** This is needed for each form **/
MauticFormValidations['drupal7performanceoptimizationmoduleslistebookdownloadform'] = {
    'email': {
        type: 'email',
        name: 'email'
    },
    'company': {
        type: 'text',
        name: 'company'
    }
};

    /** This is needed for each form **/
    MauticFormValidations['drupal8tutorials'] = {
        'email': {
            type: 'email',
            name: 'email'
        },
    };

    /** This is needed for each form **/
    MauticFormValidations['performanceoptimizationservice'] = {
        'email': {
            type: 'email',
            name: 'email'
        },
    };

MauticFormCallback['drupal7performanceoptimizationmoduleslistebookdownloadform'] = {
    'onResponseEnd': function(response) {
        if (response.success) {
            jQuery('#modal-content').after(jQuery('.mauticform-message').html());
            jQuery('.modal-scroll').css('padding', '2em 1em 1em 1em').css('font-size', '1.6em');
            jQuery('#modal-content').hide();
            window.popupMessageShown = true;
            setTimeout(function () { Drupal.CTools.Modal.modal_dismiss(); }, 3000);
        }
    }
};

MauticFormCallback['drupal8tutorials'] = {
    'onResponseEnd': function(response) {
        if (response.success && !window.popupMessageShown) {
            jQuery('#modal-content').after(jQuery('.mauticform-message').html());
            jQuery('.modal-scroll').css('padding', '2em 1em 1em 1em').css('font-size', '1.6em');
            jQuery('#modal-content').hide();
            window.popupMessageShown = true;
            setTimeout(function () { Drupal.CTools.Modal.modal_dismiss(); }, 3000);
        }
    }
};
