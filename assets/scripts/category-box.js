( function ( $ ) {
    'use strict';

    let radioInput,
        messageInput,
        unsetPrimary,
        nonceField;

    $( function () {

        // Initialize the templates
        nonceField          = wp.template( 'pcm-nonce' );
        radioInput          = wp.template( 'pcm-radio-input' );
        messageInput        = wp.template( 'pcm-message' );
        unsetPrimary        = wp.template( 'pcm-unset-primary-category' );

        const categoryList  = '#categorychecklist > li';
        let selectedValue   = primaryCategorySelected;

        // For each category insert a radio button to set as primary
        $.each( $(categoryList).find('label'), function() {
            const self          = $(this);
            const categoryValue = self.find('input').val();
            let checkedRadio = '';

            if (selectedValue.length) {
                if(selectedValue[0] === categoryValue) {
                    checkedRadio = 'checked';
                }
            }

            self.before(
                radioInput({
                    category_id: categoryValue,
                    checked: checkedRadio
                })
            );
        });

        // Add the message explaning how the plugin works
        $('#category-adder').before( messageInput() );

        // If has primary category set, show the unset button
        $('.pcm-message').after( unsetPrimary() );

        // Add Nonce field for form security
        $('#category-adder').after( nonceField() );


        // Insert the radio button for every new category created
        $(document).ajaxComplete(function(event, xhr, settings) {
            if (settings.action == 'add-category') {
                const $elementInserted  = $(categoryList + ':first');
                const categoryValue     = $elementInserted.find('input').val();

                $elementInserted.find('label').before(
                    radioInput({
                        category_id: categoryValue
                    })
                );
            }
        });

        // Unset primary category
        $('#unset_primary_category').click(function(ev) {
            ev.preventDefault();
            $('.pcm-radio').prop('checked', false);
        });

        // Check category if radio is selected
        $('.pcm-radio').click(function() {
            const self = $(this);
            if (self.is(':checked')) {
                self.next().find('input').attr('checked', 'checked');
            }
        });
    } );
}( jQuery ) );