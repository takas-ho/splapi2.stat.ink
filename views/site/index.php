<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'SPLAPI2';
?>
<div class="container">
  <h1 style="font-variant:small-caps">SPLAPI2.stat.ink</h1>
  <p>API version: 1.1.0</p>
  <hr>
  <h2 id="schedule-api">
    <?= Html::encode(Yii::t('app', 'スケジュールAPI')) . "\n" ?>
  </h2>
  <p>
    <code>GET https://splapi2.stat.ink/schedule</code>
  </p>
  <p>
    <?= Html::encode(Yii::t('app', '現在から未来にかけてのスケジュール情報を一括で返します。')) . "\n" ?>
    (<?= Html::encode(Yii::t('app', '{mimeType}形式', ['mimeType' => 'application/json'])) ?>)
  </p>
  <pre>
{
  "regular": [ // レギュラーマッチ
    {
      "mode": {  
        "key": "nawabari", // stat.ink のキーと共通
        "name": {  
          "en-GB": "Turf War",
          "en-US": "Turf War",
          "ja-JP": "ナワバリバトル"
        }
      },
      "start": { // 開始日時
        "unixtime": 1502870400, // 秒精度
        "iso8601": "2017-08-16T08:00:00+00:00" // ISO-8601拡張形式準拠。タイムゾーン不定。
      },
      "end": { // 終了日時
        "unixtime":1502877600,
        "iso8601":"2017-08-16T10:00:00+00:00"
      },
      "stages": [ 
        {  
          "splatnet": 1, // イカリング2のIDと共通
          "key": "fujitsubo", // stat.inkのキーと共通(may null)
          "name": {
            "en-GB":"Musselforge Fitness",
            "en-US":"Musselforge Fitness",
            "ja-JP":"フジツボスポーツクラブ"
          },
          "image": "https://splapi2.stat.ink/images/stage/211ae5e0-c6bc-5a5c-be9e-75e4f2a07dee.png"
        },
        {  
          "splatnet": 7,
          "key": "hokke",
          "name":{  
            "en-GB": "Port Mackerel",
            "en-US": "Port Mackerel",
            "ja-JP": "ホッケふ頭"
          },
          "image":"https://splapi2.stat.ink/images/stage/b57039a1-f9c5-5a99-93ad-db46d168926c.png"
        }
      ]
    },
    // ... repeat ...
  ],
  "gachi": [ // ガチマッチ
    // see "regular"
  ],
  "league": [ // リーグマッチ
    // see "regular"
  ],
  "fest": [] // フェスマッチ用データは現在未サポートなので必ず何も返らない
}
  </pre>
  <table class="table table-striped table-hover table-bordered" style="width:auto">
    <thead>
      <tr>
        <th><code>mode.key</code></th>
        <th><?= Html::encode(Yii::t('app', 'ルール')) ?></th>
      </tr>
    </thead>
    <tbody>
<?php
$list = [
  'nawabari' => 'ナワバリバトル',
  'area'     => 'ガチエリア',
  'yagura'   => 'ガチヤグラ',
  'hoko'     => 'ガチホコバトル',
];
foreach ($list as $key => $rule):
?>
      <tr>
        <td><code><?= Html::encode($key) ?></code></td>
        <td><?= Html::encode(Yii::t('app', $rule)) ?></td>
      </tr>
<?php endforeach ?>
    </tbody>
  </table>
  <hr>
  <h2>
    <?= Html::encode(Yii::t('app', 'ステージAPI')) . "\n" ?>
  </h2>
  <p>
    <code>GET https://splapi2.stat.ink/stages</code>
  </p>
  <p>
    <?= Html::encode(Yii::t('app', 'ステージの一覧を返します。')) . "\n" ?>
    (<?= Html::encode(Yii::t('app', '{mimeType}形式', ['mimeType' => 'application/json'])) ?>)
  </p>
  <pre>
[
  {
    // see Schedule API's stage info
  },
  // ... repeat ...
]
  </pre>
</div>
