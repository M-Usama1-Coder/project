function whhd(id) {
    let _token = $('meta[name="csrf-token"]').attr('content');
    const window_factor_uval = $('option:selected', '#window_factor').attr('uval');
    const window_uval = $('option:selected', '#window_type').attr('uval');
    const wall_uval = $('option:selected', '#wall_type').attr('uval');
    const roof_uval = $('option:selected', '#roof_type').attr('uval');
    const location_uval = $('option:selected', '#location').attr('uval');

    data = {
        _token: _token,
        window_factor_id: $('#window_factor').val(),
        window_u_value_id: $('#window_type').val(),
        wall_u_value_id: $('#wall_type').val(),
        roof_u_value_id: $('#roof_type').val(),
        location_factor_id: $('#location').val(),
        number_of_floor: $('#number_of_floor').val(),
        room_height: $('#room_height').val()
    }
    $.ajax({
        type: 'POST',
        url: url + "/updatewhhd" + '/' + id,
        data: data,
        success: function (data) {
            console.log(data);
        }
    });
    $('#window_factor_value').html(window_factor_uval);
    $('#window_u_value').html(window_uval);
    $('#wall_u_value').html(wall_uval);
    $('#roof_u_value').html(roof_uval);
    $('#location_value').html(location_uval);
    calculate();

}

function ewa(id) {
    let _token = $('meta[name="csrf-token"]').attr('content');
    const data = {
        _token: _token,
        gf_hlp: parseInt($('#gf_hlp').val()),
        ff_hlp: parseInt($('#ff_hlp').val()),
        sf_hlp: parseInt($('#sf_hlp').val())
    }

    $.ajax({
        type: 'POST',
        url: url + "/updateexternalwall" + '/' + id,
        data: data,
        success: function (data) {
            console.log(data);
        }
    });
    calculate();
}

function frhl(id) {
    let _token = $('meta[name="csrf-token"]').attr('content');
    const data = {
        _token: _token,
        highest_floor_roof_area: $('#highest_floor_roof_area').val(),
        ground_floor_area: $('#ground_floor_area').val()
    }

    $.ajax({
        type: 'POST',
        url: url + "/updatefloorroofheatloss" + '/' + id,
        data: data,
        success: function (data) {
            console.log(data);
        }
    });
    calculate();
}

function calculate() {
    const room_height = $('#room_height').val();

    var gf_hlp = $('#gf_hlp');
    var ff_hlp = $('#ff_hlp');
    var sf_hlp = $('#sf_hlp');

    var gf = $('#gf');
    var ff = $('#ff');
    var sf = $('#sf');

    var gf_room_height = $('#gf_room_height');
    var ff_room_height = $('#ff_room_height');
    var sf_room_height = $('#sf_room_height');

    var total_external_wall_area = $('#total_external_wall_area');

    var calculated_window_area = $('#calculated_window_area');
    var calculated_remaining_wall_area = $('#calculated_remaining_wall_area');
    var calculated_window_heat_loss = $('#calculated_window_heat_loss');
    var calculated_wall_heat_loss = $('#calculated_wall_heat_loss');

    var calculated_roof_heat_loss = $('#calculated_roof_heat_loss');
    var calculated_floor_heat_loss = $('#calculated_floor_heat_loss');
    var calculated_fabric_heat_loss = $('#calculated_fabric_heat_loss');
    var calculated_fabric_heat_loss_location = $('#calculated_fabric_heat_loss_location');
    var calculate_volume_m3 = $('#calculate_volume_m3');
    var calculate_ventilation_heat_loss = $('#calculate_ventilation_heat_loss');
    var floor_area = $('#floor_area');
    var fabricPVentLoss = $('#fabricPVentLoss');
    var waterHeating2k = $('#waterHeating2k');
    var heatOutputKW = $('#heatOutputKW');

    const window_factor_uval = $('option:selected', '#window_factor').attr('uval');
    const window_uval = $('option:selected', '#window_type').attr('uval');
    const wall_uval = $('option:selected', '#wall_type').attr('uval');
    const roof_uval = $('option:selected', '#roof_type').attr('uval');
    const location_uval = $('option:selected', '#location').attr('uval');
    const number_of_floor = $('#number_of_floor').val();

    const highest_floor_roof_area = $('#highest_floor_roof_area').val();
    const ground_floor_area = $('#ground_floor_area').val();
    const f_area = highest_floor_roof_area * ground_floor_area;

    //Calculation fg ff sf
    gf.text((room_height * gf_hlp.val()).toFixed(2));
    ff.text((room_height * ff_hlp.val()).toFixed(2));
    sf.text((room_height * sf_hlp.val()).toFixed(2));
    //Room height Calculations
    gf_room_height.text((parseFloat(gf.text()) * room_height).toFixed(2));
    ff_room_height.text((parseFloat(ff.text()) * room_height).toFixed(2));
    sf_room_height.text((parseFloat(sf.text()) * room_height).toFixed(2));
    //total external wall area
    total_external_wall_area.text((parseFloat(gf_room_height.text()) + parseFloat(ff_room_height.text()) +
        parseFloat(sf_room_height.text())).toFixed(2));
    //wall and window calculations
    calculated_window_area.text((parseFloat(total_external_wall_area.text()) * window_factor_uval).toFixed(2));
    calculated_remaining_wall_area.text((parseFloat(total_external_wall_area.text()) - parseFloat(calculated_window_area.text())).toFixed(2));
    calculated_window_heat_loss.text((parseFloat(calculated_window_area.text()) * window_uval).toFixed(2));
    calculated_wall_heat_loss.text((parseFloat(calculated_remaining_wall_area.text()) * wall_uval).toFixed(2));

    //floor_area
    floor_area.text((f_area).toFixed(2));
    //last table
    calculated_roof_heat_loss.text((highest_floor_roof_area * roof_uval).toFixed(2));
    calculated_floor_heat_loss.text((ground_floor_area * 0.7).toFixed(2));

    calculated_fabric_heat_loss.text((parseFloat(calculated_floor_heat_loss.text()) * parseFloat(calculated_window_heat_loss.text())).toFixed(2));
    calculated_fabric_heat_loss_location.text((parseFloat(calculated_fabric_heat_loss.text()) * location_uval).toFixed(2));

    calculate_volume_m3.text((f_area * number_of_floor * room_height).toFixed(2));
    calculate_ventilation_heat_loss.text((parseFloat(calculate_volume_m3.text()) * 0.25 * location_uval).toFixed(2));

    fabricPVentLoss.text((parseFloat(calculate_ventilation_heat_loss.text()) * parseFloat(calculated_fabric_heat_loss_location.text())).toFixed(2));
    waterHeating2k.text((parseFloat(fabricPVentLoss.text()) + 2000).toFixed(2));

    const wH2k = parseFloat(waterHeating2k.text());

    heatOutputKW.text((((wH2k * 0.25) + wH2k) / 1000).toFixed(2))
}