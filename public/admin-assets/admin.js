function empty(val) {
    return val === undefined || val === null || val === '';
}

$(document).ready(function () {
    $(".nav-treeview .nav-link, .nav-link").each(function () {
        var location2 = window.location.protocol + '//' + window.location.host + window.location.pathname;
        var link = this.href;
        if(link === location2){
            $(this).addClass('active');
            $(this).parent().parent().parent().addClass('menu-is-opening menu-open');
            const tab_content = $(this).closest('.tab-content');
            tab_content.children().each((index, el) => {
                $(el).removeClass('active')
            })
            $(this).closest('.tab-pane').addClass('active')
        }
    });

    $('.delete-btn').click(function () {
        var res = confirm('Подтвердите действия');
        if(!res){
            return false;
        }
    });

    $('.add-lang-btn').click(function () {
        let button_icon = this.children[0]
        const lang_cols = $(this).closest('.custom-form-dropdown').find('.add-lang-row');
        let select = $(this).parent().prev();
        lang_cols.toggle();

        //switching icon
        if (button_icon.dataset.isOpen === '1') {
            button_icon.className = 'nav-icon fas fa fa-angle-down'
            button_icon.setAttribute('data-is-open', 0);
        } else {
            button_icon.className = 'nav-icon fas fa fa-angle-up'
            button_icon.setAttribute('data-is-open', 1);
        }
        //working with every lang inputs
        for (const child of $(lang_cols).find('.form-input-lang-row').children()) {
            let input = child.children[0]
            input.required = !input.required
            input.disabled = !input.disabled
            input.addEventListener('change', function (event) {
                Boolean(event.target.value)
                    ? select.removeAttr('required')
                    : select.attr('required', 'required')
                // select.required = !Boolean(event.target.value)
            })
        }
    })

    /*
     * Custom form dropdown.
     * if select value changed
     * try to prepare data to CRUD operations
     */
    const custom_form_dropdown = $('.custom-form-dropdown-select.crud');
    custom_form_dropdown.change(function () {
        //get dom elements
        //like select, inputs
        const main_parent = $(this).closest('.custom-form-dropdown');
        let lang_inputs = main_parent
            .find('.form-input-lang-row') //get lang section
            .find('input'); //get lang section inputs
        const select = $(this);
        const selected_option = select.find('option:selected');
        const create_btn = main_parent.find('.add-lang--create-btn');
        const update_btn = main_parent.find('.add-lang--update-btn');
        const delete_btn = main_parent.find('.add-lang--delete-btn');

        //get values
        const id = selected_option.val();
        const name = selected_option.text();
        const name_kk = selected_option.data('name-kk');
        const name_en = selected_option.data('name-en');
        console.log(lang_inputs[0])
        //change dom elements
        if (!empty(id)) {
            lang_inputs[0].value = name;
            lang_inputs[1].value = name_kk;
            lang_inputs[2].value = name_en;
            create_btn.hide();
            update_btn.show();
            delete_btn.show();
        } else {
            lang_inputs[0].value = '';
            lang_inputs[1].value = '';
            lang_inputs[2].value = '';
            create_btn.show();
            update_btn.hide();
            delete_btn.hide();
        }
    })
    custom_form_dropdown.trigger('change')

    $('.add-lang--create-btn').click(function () {
        const main_parent = $(this).closest('.custom-form-dropdown');
        const select = main_parent.find('.custom-form-dropdown-select');
        const lang_inputs = main_parent.find('.form-input-lang-row').find('input');
        const add_lang_btn = main_parent.find('.add-lang-btn');

        const name = lang_inputs[0].value;
        const name_kk = lang_inputs[1].value;
        const name_en = lang_inputs[2].value;
        if (empty(name) || empty(name_kk) || empty(name_en)) {
            alert('Заполните все поля')
            return;
        }
        const url = $(this).val();
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                name: name,
                name_kk: name_kk,
                name_en: name_en
            },
            success: function (data) {
                console.log(data)
                if (data.id) {
                    select.append($('<option>', {
                        value: data.id,
                        text: data.name,
                        'data-name-kk': data.name_kk,
                        'data-name-en': data.name_en
                    }));
                    select.val(data.id)
                    select.trigger('change');
                    add_lang_btn.click();
                }
            }
        })

    })

    $('.add-lang--update-btn').click(function () {
        const main_parent = $(this).closest('.custom-form-dropdown');
        const select = main_parent.find('.custom-form-dropdown-select');
        const lang_inputs = main_parent.find('.form-input-lang-row').find('input');
        const id = select.val();
        const name = lang_inputs[0].value;
        const name_kk = lang_inputs[1].value;
        const name_en = lang_inputs[2].value;
        if (empty(name) || empty(name_kk) || empty(name_en)) {
            alert('Заполните все поля')
            return;
        }
        let url = $(this).val();
        url = url.replace(':id', id)
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                id: id,
                name: name,
                name_kk: name_kk,
                name_en: name_en,
                _method: 'PUT'
            },
            success: function (data) {
                console.log(data)
                if (data.id) {
                    select.find('option:selected').text(data.name)
                    select.find('option:selected').data('name-kk', data.name_kk)
                    select.find('option:selected').data('name-en', data.name_en)
                    alert('Updated successfully') //TODO: l11n
                }
            }
        })
    })

    $('.add-lang--delete-btn').click(function () {
        if (!confirm('Confirm actions')) {
            return;
        }
        const main_parent = $(this).closest('.custom-form-dropdown');
        const select = main_parent.find('.custom-form-dropdown-select');
        const lang_inputs = main_parent.find('.form-input-lang-row').find('input');
        const id = select.val();
        const name = lang_inputs[0].value;
        const name_kk = lang_inputs[1].value;
        const name_en = lang_inputs[2].value;
        if (empty(name) || empty(name_kk) || empty(name_en)) {
            alert('Заполните все поля')
            return;
        }
        let url = $(this).val();
        url = url.replace(':id', id)
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                id: id,
                _method: 'DELETE'
            },
            success: function (data) {
                console.log(data)
                if (data) {
                    select.find('option:selected').remove()
                    select.trigger('change')
                    alert('Deleted successfully') //TODO: l11n
                }
            }
        })
    })
    $('.add-lang--clear-btn').click(function () {
        const main_parent = $(this).closest('.custom-form-dropdown');
        const select = main_parent.find('.custom-form-dropdown-select');
        const lang_inputs = main_parent.find('.form-input-lang-row').find('input');
        select.val('')
        lang_inputs[0].value = '';
        lang_inputs[1].value = '';
        lang_inputs[2].value = '';
        select.trigger('change')
    })
}) //end of document ready
