document.addEventListener("DOMContentLoaded", function(event) { 

    if (document.querySelector('.user_id').getAttribute('data-useradmin') == 'isadmin1' ) {
        document.querySelector('body').classList.add('is_admin')
    } else {

        // Show only member groups named userid_1, userid_32 an so forth
        if ( document.querySelector('#pal_amg_legend #ctrl_amg label') ) {
            document.querySelectorAll('#pal_amg_legend #ctrl_amg label').forEach(element => {
                //console.log('userid_' + document.querySelector('.user_id').getAttribute('data-userid'))
                if ( element.innerHTML == 'userid_' + document.querySelector('.user_id').getAttribute('data-userid') ) {
                    element.style.display = 'inline-block'
                    element.previousElementSibling.style.display = 'inline-block'
                }
            })    
        }
        
        if ( document.querySelector('form#tl_member #ctrl_groups .sortable span') ) {
            document.querySelectorAll('form#tl_member #ctrl_groups .sortable span').forEach(element => {
                //console.log('userid_' + document.querySelector('.user_id').getAttribute('data-userid'))
                if ( element.querySelector('label').innerHTML == 'userid_' + document.querySelector('.user_id').getAttribute('data-userid') ) {
                    element.style.display = 'inline-block'
                }
            })    
        }
        

        if (window.location.href.indexOf("do=member") > -1) {            
            if (
            document.querySelector('.content .tl_formbody .tl_search.tl_subpanel input.tl_text').value != 'userid_'+document.querySelector('.user_id').getAttribute('data-userid')
            ||
            document.querySelector('.content .tl_formbody .tl_search.tl_subpanel .tl_select').value != 'user_id'
            ) {
                document.querySelector('.content .tl_formbody .tl_search.tl_subpanel .tl_select').value = 'user_id'
                document.querySelector('.content .tl_formbody .tl_search.tl_subpanel input.tl_text').value = 'userid_'+document.querySelector('.user_id').getAttribute('data-userid')
                document.querySelector('.tl_submit_panel.tl_subpanel .filter_apply').click()
            } else {
                document.querySelector('body').classList.add('page_member_filtered')
            }

        } else {
            document.querySelector('body').classList.add('page_other')
        }
        

    }

})  