document.addEventListener("DOMContentLoaded", function(event) { 

    if (document.querySelector('.admin_id').getAttribute('data-useradmin') == 'isadmin1' ) {
        document.querySelector('body').classList.add('is_admin')
    } else {

        if (window.location.href.indexOf("do=member") > -1) {            
            if (
            document.querySelector('.content .tl_formbody .tl_search.tl_subpanel input.tl_text').value != 'userid_'+document.querySelector('.admin_id').getAttribute('data-userid')
            ||
            document.querySelector('.content .tl_formbody .tl_search.tl_subpanel .tl_select').value != 'admin_id'
            ) {
                document.querySelector('.content .tl_formbody .tl_search.tl_subpanel .tl_select').value = 'admin_id'
                document.querySelector('.content .tl_formbody .tl_search.tl_subpanel input.tl_text').value = 'userid_'+document.querySelector('.admin_id').getAttribute('data-userid')
                document.querySelector('.tl_submit_panel.tl_subpanel .filter_apply').click()
            } else {
                document.querySelector('body').classList.add('page_member_filtered')
            }

        } else {
            document.querySelector('body').classList.add('page_other')
        }
    }

})  