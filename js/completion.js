/*
 * Completion Ajax scripts to track video media progress
 * retrieves a last reached progress bar fullfilled
 */

function fire_video_finished(e, api) {
    var mpid = api.conf._mplayerid;
    if (api.video.index == undefined) {
        var index = 0;
    } else {
        var index = api.video.index;
    }
    var url = wwwroot+'/mod/mplayer/ajax/markmediacompletion.php?mpid='+mpid+'&clipid='+index+'&what=finished';

    $.get(url, function(data,status) {
        $('#mplayer-progress-'+mpid+'_'+index).html(data);
    });
}

/*
 * Send video read progress and gets back html for a 'last reached progress point'
 *
 */

function send_video_progress(e, api, progresstime) {

    var mpid = api.conf._mplayerid;

    if (isNaN(clockdividers[mpid])) {
        clockdividers[mpid] = 0;
    }
    if (clockdividers[mpid] % 16 != 0) {
        clockdividers[mpid]++;
        return;
    }

    if (api.video.index == undefined) {
        var index = 0;
    } else {
        var index = api.video.index;
    }

    if (api.ready) {
        var progress = progresstime * 100 / api.video.duration
        var url = wwwroot+'/mod/mplayer/ajax/markmediacompletion.php?mpid='+mpid+'&clipid='+index+'&what=progress&progress='+progress;
        $.get(url, function(data,status) {
            $('#mplayer-progress-'+mpid+'_'+index).html(data);
        });
    }

    clockdividers[mpid]++;
}

function setup_video_progress(e, api) {
    var mpid = api.conf._mplayerid;
    clockdividers[mpid] = 0;
}

var clockdividers = new Array();

function setup_video_start(e, api) {

    api.loadSubtitles(0);

}