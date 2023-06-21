function extraction_rate_update(id) {
    let _token = $('meta[name="csrf-token"]').attr('content');
    const data = {
        _token: _token,

        kitchen_room: parseInt($('#kitchen_room').val()),
        bath_room: parseInt($('#bath_room').val()),
        utility_room: parseInt($('#utility_room').val()),
        wc_room: parseInt($('#wc_room').val()),

        kitchen_room_fan: parseInt($('#kitchen_room_fan').val()),
        bath_room_fan: parseInt($('#bath_room_fan').val()),
        utility_room_fan: parseInt($('#utility_room_fan').val()),
        wc_room_fan: parseInt($('#wc_room_fan').val()),

        kitchen_room_fan_boost: parseInt($('#kitchen_room_fan_boost').val()),
        bath_room_fan_boost: parseInt($('#bath_room_fan_boost').val()),
        utility_room_fan_boost: parseInt($('#utility_room_fan_boost').val()),
        wc_room_fan_boost: parseInt($('#wc_room_fan_boost').val()),

        kitchen_room_extractor: parseInt($('#kitchen_room_extractor').val()),
        bath_room_extractor: parseInt($('#bath_room_extractor').val()),
        utility_room_extractor: parseInt($('#utility_room_extractor').val()),
        wc_room_extractor: parseInt($('#wc_room_extractor').val()),

        kitchen_room_boost_extractor: parseInt($('#kitchen_room_boost_extractor').val()),
        bath_room_boost_extractor: parseInt($('#bath_room_boost_extractor').val()),
        utility_room_boost_extractor: parseInt($('#utility_room_boost_extractor').val()),
        wc_room_boost_extractor: parseInt($('#wc_room_boost_extractor').val()),
        'adequate': $('#extraction_adequate').val()
    }

    // total extractor calculations
    $('#kitchen_room_total_extractor').val(data.kitchen_room_fan * data.kitchen_room_extractor);
    $('#kitchen_room_total_boost_extractor').val(data.kitchen_room_fan_boost * data.kitchen_room_boost_extractor);
    $('#bath_room_total_extractor').val(data.bath_room_fan * data.bath_room_extractor);
    $('#bath_room_total_boost_extractor').val(data.bath_room_fan_boost * data.bath_room_boost_extractor);
    $('#utility_room_total_extractor').val(data.utility_room_fan * data.utility_room_extractor);
    $('#utility_room_total_boost_extractor').val(data.utility_room_fan_boost * data.utility_room_boost_extractor);
    $('#wc_room_total_extractor').val(data.wc_room_fan * data.wc_room_extractor);
    $('#wc_room_total_boost_extractor').val(data.wc_room_fan_boost * data.wc_room_boost_extractor);

    //Rate
    $('#kitchen_room_rate').val(parseInt($('#kitchen_room_total_extractor').val()) + parseInt($(
        '#kitchen_room_total_boost_extractor').val()));
    $('#bath_room_rate').val(parseInt($('#bath_room_total_extractor').val()) + parseInt($(
        '#bath_room_total_boost_extractor').val()));
    $('#utility_room_rate').val(parseInt($('#utility_room_total_extractor').val()) + parseInt($(
        '#utility_room_total_boost_extractor').val()));
    $('#wc_room_rate').val(parseInt($('#wc_room_total_extractor').val()) + parseInt($(
        '#wc_room_total_boost_extractor').val()));

    var max_rate = parseInt($('#kitchen_room_rate').val());
    max_rate += parseInt($('#bath_room_rate').val());
    max_rate += parseInt($('#utility_room_rate').val());
    max_rate += parseInt($('#wc_room_rate').val());
    $('#extraction_max_rate').html(max_rate);

    $.ajax({
        type: 'POST',
        url: url + '/extractionrateupdate/' + id,
        data: data,
        success: function (data) {
            console.log(data);
        }
    });

}

function ventilation_strategy_change(id) {
    let _token = $('meta[name="csrf-token"]').attr('content');
    $('#property_size').val(parseInt($('#gf').val()) + parseInt($('#ff').val()) + parseInt($('#sf').val()))
    const data = {
        _token: _token,
        air_permeability_issues: $('#air_permeability_issues').val(),
        air_permeability_adequate: $('#air_permeability_adequate').val(),
        dpc_condition_issues: $('#dpc_condition_issues').val(),
        dpc_condition_adequate: $('#dpc_condition_adequate').val(),
        condensation_damp_issues: $('#condensation_damp_issues').val(),
        condensation_damp_adequate: $('#condensation_damp_adequate').val(),
        combustion_appliances_issues: $('#combustion_appliances_issues').val(),
        combustion_appliances_adequate: $('#combustion_appliances_adequate').val(),
        property_size: $('#property_size').val(),
        gf: $('#gf').val(),
        ff: $('#ff').val(),
        sf: $('#sf').val()
    }
    $('#whole_dwelling_vent_rate').html(parseInt(data.property_size) * 0.3);
    $.ajax({
        type: 'POST',
        url: url + '/ventilationstrategyupdate/' + id,
        data: data,
        success: function (data) {
            console.log(data);
        }
    });
}

function undercut_update(id) {
    let _token = $('meta[name="csrf-token"]').attr('content');
    const action = parseInt($('#undercut_undercuts').val()) - parseInt($('#undercut_doors').val());
    $('#undercut_action').val(action < 0 ? 0 : action);
    const data = {
        _token: _token,
        doors: $('#undercut_doors').val(),
        undercuts: $('#undercut_undercuts').val(),
        action: $('#undercut_action').val(),
        adequate: $('#undercut_adequate').val(),
        doors_hrw: $('#doors_hrw').val(),
        undercuts_hrw: $('#undercuts_hrw').val()
    };
    // console.log(data);
    $.ajax({
        type: 'POST',
        url: url + '/doorundercutupdate/' + id,
        data: data,
        success: function (data) {
            console.log(data);
        }
    });
}

function vent_update(id) {
    let _token = $('meta[name="csrf-token"]').attr('content');
    const action = parseInt($('#vent_vents').val()) - parseInt($('#vent_windows').val());
    $('#vent_action').val(action < 0 ? 0 : action);
    const data = {
        _token: _token,
        windows: $('#vent_windows').val(),
        vents: $('#vent_vents').val(),
        action: $('#vent_action').val(),
        adequate: $('#vent_adequate').val(),
        windows_hrw: $('#windows_hrw').val(),
        vents_hrw: $('#vents_hrw').val()
    };
    // console.log(data);
    $.ajax({
        type: 'POST',
        url: url + '/backgroundtrickleupdate/' + id,
        data: data,
        success: function (data) {
            console.log(data);
        }
    });
}

function purge_ventilation_rows(id) {
    let _token = $('meta[name="csrf-token"]').attr('content');
    deg = parseFloat($('#degree_' + id).val());
    var val = 0;
    if (deg > 31) {
        val = 0.05;
    } else if (deg > 15 && deg < 30) {
        val = 0.1;
    } else {
        val = 0
    }
    const data = {
        _token: _token,
        room_name: $('#room_name_' + id).val(),
        room_size: $('#room_size_' + id).val(),
        windows_doors: $('#windows_doors_' + id).val(),
        height: $('#height_' + id).val(),
        width: $('#width_' + id).val(),
        degree: $('#degree_' + id).val(),
        proportion: $('#proportion_' + id).val(),
        action: $('#action_' + id).val()
    };
    $('#proportion_' + id).val(val);
    data.proportion = val;
    $('#hxw_' + id).val((parseFloat(data.height) * parseFloat(data.width)).toFixed(2));
    $('#sxp_' + id).val((parseFloat(data.room_size) * parseFloat(data.proportion)).toFixed(2));
    $.ajax({
        type: 'POST',
        url: url + '/purgeventilationupdaterow/' + id,
        data: data,
        success: function (data) {
            console.log(data);
        }
    });
}

function purge_ventilation(id) {
    let _token = $('meta[name="csrf-token"]').attr('content');
    const data = {
        _token: _token,
        adequate: $('#purge_ventilation_adequate').val()
    }
    $.ajax({
        type: 'POST',
        url: url + '/purgeventilationupdate/' + id,
        data: data,
        success: function (data) {
            console.log(data);
        }
    });
}