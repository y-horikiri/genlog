import {DEF_GAUGES} from "./constants.js";
import {padLeft} from "./util.js";
/* globals Pikaday */
"use strict";

// ゲージ簡易入力ボタン
$(".gaugebutton").click(function () {
    // 楽器種類に応じて使用するマスタを決定
    const master = DEF_GAUGES.get($("#gear_type").val());
    // マスタから押されたボタンのゲージを取得
    const gauge = master.get($(this).val());

    // 入力欄に値を埋め込む
    $("#gauge_1").val(gauge.gauge1);
    $("#gauge_2").val(gauge.gauge2);
    $("#gauge_3").val(gauge.gauge3);
    $("#gauge_4").val(gauge.gauge4);
    $("#gauge_5").val(gauge.gauge5);
    $("#gauge_6").val(gauge.gauge6);

});

// 前回と同じボタン
$("#same").click(function () {
    $("#brand").val($("#previous_brand").val());
});

// ゲージの欄を0埋めする
$(".gauge").change(function () {
    // 桁数
    let len;
    switch ($("#gear_type").val()) {
        case "1": // エレキギター
        case "2": // アコースティックギター
            len = 2;
            break;
        case "3": //エレキベース
            len = 3;
            break;
        default: //ありえない想定
            len = 2;
            break;
    }
    $(this).val(padLeft($(this).val(), "0", len));

});

let picker = new Pikaday({
    //対象となる要素
    field: $("#change_date")[0],
    //カレンダーを表示する際に起点になる要素
    //fieldに指定した要素にフォーカスした際に自動的にカレンダーが表示されるか
    bound: true,
    //カレンダーが表示される位置(top right, bottom right)
    position: "bottom left",
    //出力する際のフォーマット
    toString: function(date,format){
        const day = ('0' + date.getDate()).slice(-2);
        const month = ('0' + (date.getMonth() + 1)).slice(-2);
        const year = date.getFullYear();
        const result = year + "/" + month + "/" +day;
        return result;
    },
    //最初に表示された際に選択されている日付
    defaultDate: new Date(),
    //初期化する際にdefaultDateで指定された日付を入力フォームに入力しておくか
    setDefaultDate: true,
    //カレンダーで表示する最初の曜日(0: Sunday, 1: Monday, etc)
    firstDay: 0,
    //選択することができる最小の日付
    minDate: new Date('2000-10-01'),
    //選択することができる最大の日付
    maxDate: new Date('2099-12-31'),
    //プルダウンで選択することができる日付の範囲(ex 10 or [2000, 2020])
    yearRange: [2000, 2099],
    //カレンダーの日付の表示順序を逆にするか
    isRTL: false,
    //国際化
    i18n: {
        previousMonth: '前の月',
        nextMonth: '次の月',
        months: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月',],
        weekdays: ['日曜日', '月曜日', '火曜日', '水曜日', '木曜日', '金曜日', '土曜日'],
        weekdaysShort: ['日', '月', '火', '水', '木', '金', '土']
    },
    //カレンダーの年の後に表示する文字列
    yearSuffix: '年',
    //年の後に月を表示するか
    showMonthAfterYear: true,
    //日付を選択したときの処理
    onSelect: function () {
        console.dir(this);
    },
    //カレンダーを表示したときの処理
    onOpen: function () {
        console.dir(this);
    },
    //カレンダーを閉じたときの処理
    onClose: function () {
        console.dir(this);
    },
    //月を変更したときの処理
    onDraw: function () {
        console.dir(this);
    },
});
