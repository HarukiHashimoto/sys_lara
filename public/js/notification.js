// デスクトップ通知

$('.save_btn').on('click', notification);

function notification() {
    var options = {
        body : "CT-Learn",
        icon : '/sys_lara/public/image/favicon/48.png'
    }
    var n = new Notification("Save Your Model!!!",options);
    // タイムアウト設定
    setTimeout(n.close.bind(n), 2000);
}
