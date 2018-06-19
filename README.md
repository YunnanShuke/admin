<p align="center"><img src="https://www.ynshuke.com/wp-content/uploads/2017/02/3-2.png"></p>

<p align="center">
<a href="https://ic.ynshuke.com/109.html"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://ic.ynshuke.com/109.html"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://ic.ynshuke.com/109.html"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://ic.ynshuke.com/109.html"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## 云南蠡导文化发展有限公司小程序后端服务
  采用Laravel框架作为该小程序的后台服务开发。由小程序发起get或者post请求，DNS讲域名解析到服务器地址，交由nginx解析到larave框架的统一入口文件（./public/index.php），路由将相关链接指向相应的中间件或控制器，控制器对数据进行处理并和数据库交互。返回用户需要的信息（类似API）。

## 支持的接口

- [用户接口](https://www.sixos.io/blog/lj-api.html#%E7%94%A8%E6%88%B7%E6%8E%A5%E5%8F%A3)
- [攻略接口](https://www.sixos.io/blog/lj-api.html#%E6%94%BB%E7%95%A5%E6%8E%A5%E5%8F%A3)
- [OPENID接口](https://www.sixos.io/blog/lj-api.html#%E8%8E%B7%E5%8F%96OPENID%E6%8E%A5%E5%8F%A3)
- [境内游接口](https://www.sixos.io/blog/lj-api.html#%E8%8E%B7%E5%8F%96%E5%A2%83%E5%86%85%E6%B8%B8%E4%BF%A1%E6%81%AF)
- [境外游接口](https://www.sixos.io/blog/lj-api.html#%E8%8E%B7%E5%8F%96%E5%A2%83%E5%A4%96%E6%B8%B8%E4%BF%A1%E6%81%AF)
- [民族风俗接口](https://www.sixos.io/blog/lj-api.html#%E8%8E%B7%E5%8F%96%E6%B0%91%E6%97%8F%E9%A3%8E%E4%BF%97%E4%BF%A1%E6%81%AF)
- [预约信息接口](https://www.sixos.io/blog/lj-api.html#%E9%A2%84%E7%BA%A6%E4%BF%A1%E6%81%AF%E6%8E%A5%E5%8F%A3)
- [活动信息接口](https://www.sixos.io/blog/lj-api.html#%E8%8E%B7%E5%8F%96%E6%B4%BB%E5%8A%A8%E4%BF%A1%E6%81%AF%E6%8E%A5%E5%8F%A3)

## 部分接口说明
## 用户接口

### 基本信息([什么是resource？](https://sixos.io/blog/resource.html))
```
接口地址后缀：users
请求类型：resource
请求头包含字段：token、openid
```

### 数据库字段说明
```sql
-- auto-generated definition
create table users
(
  id         int unsigned auto_increment
    primary key,
  openid     varchar(255) null
  comment '微信openid',
  nickName   varchar(255) null
  comment '用户昵称',
  avatarUrl  varchar(255) null
  comment '用户头像，最后一个数值代表正方形头像大小（有0、46、64、96、132数值可选，0代表640*640正方形头像），用户没有头像时该项为空。若用户更换头像，原有头像URL将失效。',
  gender     varchar(255) null
  comment '用户的性别，值为1时是男性，值为2时是女性，值为0时是未知',
  city       varchar(255) null
  comment '用户所在城市',
  province   varchar(255) null
  comment '用户所在省份',
  country    varchar(255) null
  comment '用户所在国家',
  language   varchar(255) null
  comment '用户的语言，简体中文为zh_CN',
  address    varchar(255) null
  comment '用户地址',
  phone      varchar(255) null
  comment '手机号',
  api_token  varchar(255) null
  comment '接口请求token',
  created_at timestamp    null,
  updated_at timestamp    null,
  deleted_at timestamp    null
)
  collate = utf8mb4_unicode_ci;
```

### 查询接口
#### 查询所有用户
```url
接口链接后缀：users
接口请求类型：GET
请求头包含字段：token、openid
```
##### 返回数据示例
```json
[
    [
        {
            "id": 1,
            "openid": "o1f5_4nPMp_XcOIzh_**********",
            "nickName": "sixos",
            "avatarUrl": "https://wx.qlogo.cn/mmopen/vi_32/IXmQQicJMxkQwibvfCKVuCdrlIZveibiaPMPvHPjbz7HHeofVt2l0SKdibXUZaNkFP5k2TTA53lGyhCktDNm1QSdp7g/132",
            "gender": "1",
            "city": null,
            "province": "云南",
            "country": "中国",
            "language": "zh_CN",
            "address": null,
            "phone": "15559757745",
            "api_token": "zxTInQr3paStN0h50AFqLfCwPdSoA5gTF26BxM96cn3GLXD2kVmc6cpvotOE",
            "created_at": "2018-06-08 02:19:55",
            "updated_at": "2018-06-08 02:19:55",
            "deleted_at": null
        },
        {
            "id": 2,
            "openid": "o1f5_4ryrz8rL1w3Qe**********",
            "nickName": "专业小程序、网站、商城开发【数科",
            "avatarUrl": "https://wx.qlogo.cn/mmopen/vi_32/ickRAJe2gicXwlx6CMRuo65a92mdysW3vZH7yowS5e8LpK0hIcCd4ia8Q8Zdeu8vtNamCE0mPb9frCJBP6E1Rdlcg/132",
            "gender": "1",
            "city": "昆明",
            "province": "云南",
            "country": "中国",
            "language": "zh_CN",
            "address": null,
            "phone": "18687607601",
            "api_token": "m6ihnCc5DMMItCZRAFvFWhquS1XVuLX9DCFgO2bxdUNoWg10IrzmRFtFYPUf",
            "created_at": "2018-06-08 02:21:55",
            "updated_at": "2018-06-08 02:21:55",
            "deleted_at": null
        },
        {
            "id": 3,
            "openid": "o1f5_4qhPbGP04xQea**********",
            "nickName": "45度",
            "avatarUrl": "https://wx.qlogo.cn/mmopen/vi_32/lN731jjXHbbYvibs8coaKxKvdKkKiaWNKsM86ALxSQxiafsLgRunxGaNaleDIp1C3nicLtpfa8jQttN6Nbbf0sOo7g/132",
            "gender": "1",
            "city": "昆明",
            "province": "云南",
            "country": "中国",
            "language": "zh_CN",
            "address": null,
            "phone": null,
            "api_token": "BgQMl1nZXwoGBsC9gRfngA6ACGc61I8oQhu6PjuaPTDw8iGkjDc4X4jIkMFm",
            "created_at": "2018-06-08 04:21:02",
            "updated_at": "2018-06-08 04:21:02",
            "deleted_at": null
        },
        {
            "id": 4,
            "openid": "o1f5_4umh493loa5V7**********",
            "nickName": "依然",
            "avatarUrl": "https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTKgAvs0p7Z2obtcV5NOQQc4CfHTFnI0YxuDzVKGsSPjhJtoR14UhYjC9w6gP7bmribdE60bhBQL7dg/132",
            "gender": "1",
            "city": "玉溪",
            "province": "云南",
            "country": "中国",
            "language": "zh_CN",
            "address": null,
            "phone": "17778024174",
            "api_token": "Rk0PMYJUCbkZoJ7jAAkkQoYEOIrkIVB5P9Ed8X85ggU7jTBKnpVE4mCevurv",
            "created_at": "2018-06-08 07:57:34",
            "updated_at": "2018-06-08 07:57:34",
            "deleted_at": null
        }
    ]
]
```

#### 查询单个用户
```url
接口链接后缀：users/{id?}
接口请求类型：GET
请求头包含字段：token、openid
```
##### 返回信息（json）
```json
[
 {
    "status": "接口请求成功！",
    "status_code": 200,
    "data": {
        "id": 1,
        "openid": "o1f5_4nPMp_XcOIzh_5kVlantics",
        "nickName": "sixos",
        "avatarUrl": "https://wx.qlogo.cn/mmopen/vi_32/IXmQQicJMxkQwibvfCKVuCdrlIZveibiaPMPvHPjbz7HHeofVt2l0SKdibXUZaNkFP5k2TTA53lGyhCktDNm1QSdp7g/132",
        "gender": "0",
        "city": null,
        "province": "云南",
        "country": "中国",
        "language": "zh_CN",
        "address": null,
        "phone": "15559757745",
        "api_token": "zxTInQr3paStN0h50AFqLfCwPdSoA5gTF26BxM96cn3GLXD2kVmc6cpvotOE",
        "created_at": "2018-06-08 02:19:55",
        "updated_at": "2018-06-11 08:26:02",
        "deleted_at": null
    }
 }
]


or

[
 {
    "status": "接口请求失败！",
    "status_code": 100,
    "message": "数据库操作失败！",
    "data": null
 }
]
```

### 插入用户
```url
接口链接后缀：users
接口请求类型：POST
请求头包含字段：token、openid
```
##### 需要的字段信息
```json
[
  {
	  "openid": "o1f5_4nPMp_XcOIzh_5k********",
		"nickName":"SixOS",
		"avatarUrl":"https://wx.qlogo.cn/mmopen/vi_32/IXmQQicJMxkQwibvfCKVuCdrlIZveibiaPMPvHPjbz7HHeofVt2l0SKdibXUZaNkFP5k2TTA53lGyhCktDNm1QSdp7g/132",
		"gender":"1",
		"city":"昆明",
		"province": "云南",
		"country": "中国",
		"language": "zh-CN",
		"address": "云南省昆明市五华区",
		"phone": "15559757745"
 }
]
```
##### 返回信息
```json
[
 {
    "status": "接口请求成功！",
    "status_code": 200,
    "msg": "插入数据成功！"
 }
]

or

[
 {
    "status": "接口请求失败！",
    "status_code": 100,
    "msg": "插入数据失败！"
 }
]
```


## 攻略接口
### 基本信息([什么是resource？](https://sixos.io/blog/resource.html))
```
接口地址后缀：strategys
请求类型：resource
请求头包含字段：token、openid
```
### 数据库字段说明
```json
-- auto-generated definition
create table articles
(
  id               int unsigned auto_increment
    primary key,
  article_title    varchar(255) null
  comment '文章标题',
  article_pic      varchar(255) null
  comment '文章缩略图',
  article_content  longtext     null
  comment '文章内容',
  article_foot_pic varchar(255) null
  comment '文章底部图片',
  article_type     varchar(255) null
  comment '文章分类',
  article_click    int          null
  comment '文章点击量',
  created_at       timestamp    null,
  updated_at       timestamp    null,
  deleted_at       timestamp    null
)
  collate = utf8mb4_unicode_ci;
```
### 获取所有攻略信息
#### 获取所有攻略信息
```
接口地址后缀：strategys
请求类型：GET
请求头包含字段：token、openid
```
#### 获取单个攻略信息
```
接口地址后缀：strategys/{id?}
请求类型：GET
请求头包含字段：token、openid
```
##### 返回结果（JSON）
```json
{
    "status": "接口请求成功！",
    "status_code": 200,
    "data": [
        {
            "id": 6,
            "article_title": "南纬8度，巴厘岛5日，打卡经典必游及小众岛屿深度游",
            "article_pic": "images/balidao2.jpg",
            "article_content": "<p></p><p>巴厘岛是印度尼西亚17000多个岛屿当中最耀眼的一个岛屿，位于爪哇岛东部，面积5620平方公里，岛上山脉纵横、风情万种、景物绮丽，被称为“神明之岛”，2015年被美国《旅游+休闲》杂志评为世界上最佳的岛屿之一。<br>岛上东西宽140公里，南北相距80公里，全岛总面积为5620㎞²。是世界著名旅游岛，印度尼西亚33个一级行政区之一。<br>巴厘岛上大部分为山地，全岛山脉纵横，地势东高西低。岛上的最高峰是阿贡火山海拔3142米。巴厘岛是印度尼西亚唯一信奉印度教的地区。80%的人信奉印度教。主要通行的语言是印尼语和英语。<br>沙努尔、努沙-杜尔和库达等处的海滩，是岛上景色最美的海滨浴场，这里沙细滩阔、海水湛蓝清澈。每年来此游览的各国游客络绎不绝。<br>由于巴厘岛万种风情，景物甚为绮丽。因此，它还享有多种别称，如“神明之岛”、“恶魔之岛”、“罗曼斯岛”、“绮丽之岛”、“天堂之岛”、“魔幻之岛”、“花之岛”等。<br>2015年由美国著名旅游杂志《旅游+休闲》一项调查结果把印尼巴厘岛评为世界上最佳的岛屿之一。</p><h3>图片欣赏：</h3><p><img src=\"http://yxz.ynshuke.com/uploads/images/1528809329DzheVf.jpg\" style=\"max-width:100%;\"><img src=\"http://yxz.ynshuke.com/uploads/images/152880932971KQOI.jpg\" style=\"max-width: 100%;\"><img src=\"http://yxz.ynshuke.com/uploads/images/1528809329spNBZ3.jpg\" style=\"max-width: 100%;\"><br></p>",
            "article_type": "1",
            "article_click": 34,
            "created_at": "2018-06-12 13:15:38",
            "updated_at": "2018-06-12 13:15:38",
            "deleted_at": null
        }
    ]
}

or

{
    "status": "接口请求失败！",
    "status_code": 100,
    "msg": "数据库操作失败！"
}
```

## 获取OPENID接口
### 基本信息
```
接口地址后缀：openid/{code?}
请求类型：POST
请求头包含字段：token、openid
```

** 注意 ** ：URL中的code为前端调取接口获得用户授权后返回的code值

### 返回数据示例
```'json
{ 
    "access_token":"Lb3FjDBgkeWRCvtniFv3PFQGNu59yVv9",
    "openid":"o1f5_4nPMp_XcOIzh_5k********"
}
```

## 获取境内游信息
### 基本信息
#### 获取所有境内游信息
```
接口地址后缀：territories
请求类型：GET
请求头包含字段：token、openid
```

#### 获取单个境内游信息
```
接口地址后缀：territories/{id?}
请求类型：GET
请求头包含字段：token、openid
```

### 数据库字段说明
```json
-- auto-generated definition
create table articles
(
  id               int unsigned auto_increment
    primary key,
  article_title    varchar(255) null
  comment '文章标题',
  article_pic      varchar(255) null
  comment '文章缩略图',
  article_content  longtext     null
  comment '文章内容',
  article_foot_pic varchar(255) null
  comment '文章底部图片',
  article_type     varchar(255) null
  comment '文章分类',
  article_click    int          null
  comment '文章点击量',
  created_at       timestamp    null,
  updated_at       timestamp    null,
  deleted_at       timestamp    null
)
  collate = utf8mb4_unicode_ci;
```

### 返回数据示例
```json
{
    "status": "接口请求成功！",
    "status_code": 200,
    "data": [
        {
            "id": 1,
            "mall_pic": "images/84e810da1b5dc0c11bed41c5da7aefe7.jpg",
            "mall_title": "观音峡一日游",
            "mall_desc": "观音峡景区项目包含：观音峡景区门票（1张）、游船票（1张）、旱滑道票（1张）、玻璃栈道票（1张）、滑道车票（1张）",
            "mall_or_Price": "0",
            "mall_price": "0",
            "mall_suk": 0,
            "mall_content": "<p></p><p></p><h3>观音峡一日游</h3><p>9:00-9:30 【集合/上车时间】：9:00-9:30左右，确定行程后在出发前一晚上22:00左右领队会与您联系并确认具体的出发时间和地点</p><p> 集合方式：市区内各大酒店上门接送，大研古镇、束河古镇周边就近地点接送</p><p><h3>【观音峡】</h3>观音峡景区项目包含：观音峡景区门票（1张）、游船票（1张）、旱滑道票（1张）、玻璃栈道票（1张）、滑道车票（1张）；<br>观音峡景区位于丽江市东南17公里处，是茶马古道滇藏线上一个险关要塞；是一个以山水、峡谷、森林、湖泊等自然景观为基础，以茶马古街，纳西村落、民俗、宗教风情等人文景观为一体的风景区。“漫漫雄关邱塘道，悠悠茶马滇藏情”，就是对丽江观音峡的很好的描述。在这可以观看峡谷内形状奇伟的地质造型，还可以走走茶马古道，在木家别院坐坐，感受浓郁的茶马古道风情。景区内山水、湖泊、峡谷、森林和瀑布一应俱全，自然风光优美。<br><br>8人一桌炒菜或是自助餐，随机安排<br><br>乘车返回市区（行驶时间约30分钟），可送回丽江古城周边、束河古镇周边。<br>愉快地结束当天的行程！<br></p><p></p><h3>景点欣赏：</h3><p><img src=\"http://yxz.ynshuke.com/uploads/images/1528807136wyOiTT.jpg\" style=\"max-width:100%;\"><img src=\"http://yxz.ynshuke.com/uploads/images/1528807136IkD23G.jpg\" style=\"max-width: 100%;\"><br></p>",
            "tourism_phone": "15559757745",
            "tourism_name": "净地旅行",
            "mall_type": "1",
            "created_at": "2018-06-12 12:40:20",
            "updated_at": "2018-06-12 13:37:37",
            "deleted_at": null
        }
    ]
}
```

## 获取境外游信息
### 基本信息（境外）
#### 获取所有境外游信息
```
接口地址后缀：abroads
请求类型：GET
请求头包含字段：token、openid
```

#### 获取单个境外信息
```
接口地址后缀：abroads/{id?}
请求类型：GET
请求头包含字段：token、openid
```

### 数据字段说明
```json
-- auto-generated definition
create table articles
(
  id               int unsigned auto_increment
    primary key,
  article_title    varchar(255) null
  comment '文章标题',
  article_pic      varchar(255) null
  comment '文章缩略图',
  article_content  longtext     null
  comment '文章内容',
  article_foot_pic varchar(255) null
  comment '文章底部图片',
  article_type     varchar(255) null
  comment '文章分类',
  article_click    int          null
  comment '文章点击量',
  created_at       timestamp    null,
  updated_at       timestamp    null,
  deleted_at       timestamp    null
)
  collate = utf8mb4_unicode_ci;
```

### 返回数据示例（JSON）
```json
{
    "status": "接口请求成功！",
    "status_code": 200,
    "data": [
        {
            "id": 3,
            "mall_pic": "images/629c7685e4b5444357f56412485b483b.jpg",
            "mall_title": "马尔代夫3日游",
            "mall_desc": "杭州转上海，佳直飞或者上海新航到达马累，建议直飞 比较省事，价格也划算。",
            "mall_or_Price": "0",
            "mall_price": "0",
            "mall_suk": 0,
            "mall_content": "<p></p><div><header><div><br><div>同步手机端，随时随地follow行程</div></div></header></div><section><div id=\"view-day-eb45ea7a429e93e13e63c7fd\"></div><header><div>01第1天马累</div></header><footer><p>杭州转上海，佳直飞或者上海新航到达马累，建议直飞 比较省事，价格也划算。</p></footer><div><div id=\"eb45ea7a429e93e13e63c7fd-1\"></div><section><header><div title=\"火车\"></div><div></div></header><div>杭州 马累</div></section></div><div><div id=\"eb45ea7a429e93e13e63c7fd-2\"></div><section><header><div></div><div><a pb-id=\"sceneView_2\" href=\"http://lvyou.baidu.com/malei?ext_from=plan&innerfr_pg=planDetailPg&from_id=412505766f40a7d0eb18359e&third_from=planView\" target=\"_blank\">马累</a></div></header><div><div><div><p>建议游玩时间1天</p></div></div><div><a pb-id=\"sceneView_2\" target=\"_blank\" href=\"http://lvyou.baidu.com/malei?ext_from=plan&innerfr_pg=planDetailPg&from_id=412505766f40a7d0eb18359e&third_from=planView\"><img src=\"http://gss0.baidu.com/6b1IcTe9R1gBo1vgoIiO_jowehsv/maps/services/thumbnails?width=200&height=150&quality=100&align=middle,middle&src=http://gss0.baidu.com/7LsWdDW5_xN3otqbppnN2DJv/lvpics/pic/item/18d8bc3eb13533fa60c96a49a9d3fd1f41345b5e.jpg\" alt=\"马累图片，游玩图片\"></a><a pb-id=\"sceneView_2\" target=\"_blank\" href=\"http://lvyou.baidu.com/malei?ext_from=plan&innerfr_pg=planDetailPg&from_id=412505766f40a7d0eb18359e&third_from=planView\"><img src=\"http://gss0.baidu.com/6b1IcTe9R1gBo1vgoIiO_jowehsv/maps/services/thumbnails?width=200&height=150&quality=100&align=middle,middle&src=http://gss0.baidu.com/7LsWdDW5_xN3otqbppnN2DJv/lvpics/pic/item/a8ec8a13632762d04c05ffdfa3ec08fa513dc693.jpg\" alt=\"马累图片，游玩图片\"></a><a pb-id=\"sceneView_2\" target=\"_blank\" href=\"http://lvyou.baidu.com/malei?ext_from=plan&innerfr_pg=planDetailPg&from_id=412505766f40a7d0eb18359e&third_from=planView\"><img src=\"http://gss0.baidu.com/6b1IcTe9R1gBo1vgoIiO_jowehsv/maps/services/thumbnails?width=200&height=150&quality=100&align=middle,middle&src=http://gss0.baidu.com/7LsWdDW5_xN3otqbppnN2DJv/lvpics/pic/item/37d12f2eb9389b50f8b019358435e5dde7116e0e.jpg\" alt=\"马累图片，游玩图片\"></a><a pb-id=\"sceneView_2\" target=\"_blank\" href=\"http://lvyou.baidu.com/malei?ext_from=plan&innerfr_pg=planDetailPg&from_id=412505766f40a7d0eb18359e&third_from=planView\"><img src=\"http://gss0.baidu.com/6b1IcTe9R1gBo1vgoIiO_jowehsv/maps/services/thumbnails?width=200&height=150&quality=100&align=middle,middle&src=http://gss0.baidu.com/7LsWdDW5_xN3otqbppnN2DJv/lvpics/pic/item/80cb39dbb6fd5266df61c573aa18972bd407360a.jpg\" alt=\"马累图片，游玩图片\"></a><a pb-id=\"sceneView_2\" target=\"_blank\" href=\"http://lvyou.baidu.com/malei?ext_from=plan&innerfr_pg=planDetailPg&from_id=412505766f40a7d0eb18359e&third_from=planView\"><img src=\"http://gss0.baidu.com/6b1IcTe9R1gBo1vgoIiO_jowehsv/maps/services/thumbnails?width=200&height=150&quality=100&align=middle,middle&src=http://gss0.baidu.com/7LsWdDW5_xN3otqbppnN2DJv/lvpics/pic/item/fc1f4134970a304ecdfd589dd0c8a786c8175cfe.jpg\" alt=\"马累图片，游玩图片\"></a></div></div></section></div><div><div id=\"eb45ea7a429e93e13e63c7fd-3\"></div><section><header><div></div><div><a pb-id=\"sceneView_2\" href=\"http://lvyou.baidu.com/maerdaifuguojiabowuguan?ext_from=plan&innerfr_pg=planDetailPg&from_id=412505766f40a7d0eb18359e&third_from=planView\" target=\"_blank\">马尔代夫国家博物馆</a></div></header><div><div><div><p>建议游玩时间1小时</p></div></div><div></div></div></section><div><div></div><br><div></div></div></div><div><div id=\"eb45ea7a429e93e13e63c7fd-4\"></div><section><header><div></div><div><a pb-id=\"sceneView_2\" href=\"http://lvyou.baidu.com/laolibaiwuqingzhensi?ext_from=plan&innerfr_pg=planDetailPg&from_id=412505766f40a7d0eb18359e&third_from=planView\" target=\"_blank\">老礼拜五清真寺</a></div></header><div><div><div><p>建议游玩时间半小时</p></div></div><div><a pb-id=\"sceneView_2\" target=\"_blank\" href=\"http://lvyou.baidu.com/laolibaiwuqingzhensi?ext_from=plan&innerfr_pg=planDetailPg&from_id=412505766f40a7d0eb18359e&third_from=planView\"><img src=\"http://gss0.baidu.com/6b1IcTe9R1gBo1vgoIiO_jowehsv/maps/services/thumbnails?width=200&height=150&quality=100&align=middle,middle&src=http://gss0.baidu.com/7LsWdDW5_xN3otqbppnN2DJv/lvpics/pic/item/c8177f3e6709c93d633990249f3df8dcd000541d.jpg\" alt=\"老礼拜五清真寺图片，游玩图片\"></a><a pb-id=\"sceneView_2\" target=\"_blank\" href=\"http://lvyou.baidu.com/laolibaiwuqingzhensi?ext_from=plan&innerfr_pg=planDetailPg&from_id=412505766f40a7d0eb18359e&third_from=planView\"><img src=\"http://gss0.baidu.com/6b1IcTe9R1gBo1vgoIiO_jowehsv/maps/services/thumbnails?width=200&height=150&quality=100&align=middle,middle&src=http://gss0.baidu.com/7LsWdDW5_xN3otqbppnN2DJv/lvpics/pic/item/14ce36d3d539b60095c29664e950352ac75cb7d1.jpg\" alt=\"老礼拜五清真寺图片，游玩图片\"></a><a pb-id=\"sceneView_2\" target=\"_blank\" href=\"http://lvyou.baidu.com/laolibaiwuqingzhensi?ext_from=plan&innerfr_pg=planDetailPg&from_id=412505766f40a7d0eb18359e&third_from=planView\"><img src=\"http://gss0.baidu.com/6b1IcTe9R1gBo1vgoIiO_jowehsv/maps/services/thumbnails?width=200&height=150&quality=100&align=middle,middle&src=http://gss0.baidu.com/7LsWdDW5_xN3otqbppnN2DJv/lvpics/pic/item/37d12f2eb9389b50cfa2d46b8635e5dde7116ead.jpg\" alt=\"老礼拜五清真寺图片，游玩图片\"></a><a pb-id=\"sceneView_2\" target=\"_blank\" href=\"http://lvyou.baidu.com/laolibaiwuqingzhensi?ext_from=plan&innerfr_pg=planDetailPg&from_id=412505766f40a7d0eb18359e&third_from=planView\"><img src=\"http://gss0.baidu.com/6b1IcTe9R1gBo1vgoIiO_jowehsv/maps/services/thumbnails?width=200&height=150&quality=100&align=middle,middle&src=http://gss0.baidu.com/7LsWdDW5_xN3otqbppnN2DJv/lvpics/pic/item/4610b912c8fcc3ce05d2fd0a9145d688d43f20fc.jpg\" alt=\"老礼拜五清真寺图片，游玩图片\"></a><a pb-id=\"sceneView_2\" target=\"_blank\" href=\"http://lvyou.baidu.com/laolibaiwuqingzhensi?ext_from=plan&innerfr_pg=planDetailPg&from_id=412505766f40a7d0eb18359e&third_from=planView\"><img src=\"http://gss0.baidu.com/6b1IcTe9R1gBo1vgoIiO_jowehsv/maps/services/thumbnails?width=200&height=150&quality=100&align=middle,middle&src=http://gss0.baidu.com/7LsWdDW5_xN3otqbppnN2DJv/lvpics/pic/item/2e2eb9389b504fc29606c519e7dde71190ef6d54.jpg\" alt=\"老礼拜五清真寺图片，游玩图片\"></a></div></div></section><div><div></div> <div>两地距离：0.3 公里 时间：步行约4分钟 <a target=\"_blank\" href=\"https://www.google.com/maps/dir/4.178036,73.512394/4.177814,73.509846\">[查看交通]</a></div></div></div><div><div id=\"eb45ea7a429e93e13e63c7fd-5\"></div><section><header><div></div><div><a pb-id=\"sceneView_2\" href=\"http://lvyou.baidu.com/maleishichang?ext_from=plan&innerfr_pg=planDetailPg&from_id=412505766f40a7d0eb18359e&third_from=planView\" target=\"_blank\">马累市场</a></div></header><div><div><p>建议游玩时间1小时</p></div><div><a pb-id=\"sceneView_2\" target=\"_blank\" href=\"http://lvyou.baidu.com/maleishichang?ext_from=plan&innerfr_pg=planDetailPg&from_id=412505766f40a7d0eb18359e&third_from=planView\"><img src=\"http://gss0.baidu.com/6b1IcTe9R1gBo1vgoIiO_jowehsv/maps/services/thumbnails?width=200&height=150&quality=100&align=middle,middle&src=http://gss0.baidu.com/7LsWdDW5_xN3otqbppnN2DJv/lvpics/pic/item/aa64034f78f0f736e85ac9d20a55b319eac413b8.jpg\" alt=\"马累市场图片，游玩图片\"></a><a pb-id=\"sceneView_2\" target=\"_blank\" href=\"http://lvyou.baidu.com/maleishichang?ext_from=plan&innerfr_pg=planDetailPg&from_id=412505766f40a7d0eb18359e&third_from=planView\"><img src=\"http://gss0.baidu.com/6b1IcTe9R1gBo1vgoIiO_jowehsv/maps/services/thumbnails?width=200&height=150&quality=100&align=middle,middle&src=http://gss0.baidu.com/7LsWdDW5_xN3otqbppnN2DJv/lvpics/pic/item/4610b912c8fcc3ced9a34ce09245d688d53f2085.jpg\" alt=\"马累市场图片，游玩图片\"></a><a pb-id=\"sceneView_2\" target=\"_blank\" href=\"http://lvyou.baidu.com/maleishichang?ext_from=plan&innerfr_pg=planDetailPg&from_id=412505766f40a7d0eb18359e&third_from=planView\"><img src=\"http://gss0.baidu.com/6b1IcTe9R1gBo1vgoIiO_jowehsv/maps/services/thumbnails?width=200&height=150&quality=100&align=middle,middle&src=http://gss0.baidu.com/7LsWdDW5_xN3otqbppnN2DJv/lvpics/pic/item/dcc451da81cb39db01527349d2160924ab18301a.jpg\" alt=\"马累市场图片，游玩图片\"></a><a pb-id=\"sceneView_2\" target=\"_blank\" href=\"http://lvyou.baidu.com/maleishichang?ext_from=plan&innerfr_pg=planDetailPg&from_id=412505766f40a7d0eb18359e&third_from=planView\"><img src=\"http://gss0.baidu.com/6b1IcTe9R1gBo1vgoIiO_jowehsv/maps/services/thumbnails?width=200&height=150&quality=100&align=middle,middle&src=http://gss0.baidu.com/7LsWdDW5_xN3otqbppnN2DJv/lvpics/pic/item/77c6a7efce1b9d16964a8e7ef1deb48f8c54641b.jpg\" alt=\"马累市场图片，游玩图片\"></a><a pb-id=\"sceneView_2\" target=\"_blank\" href=\"http://lvyou.baidu.com/maleishichang?ext_from=plan&innerfr_pg=planDetailPg&from_id=412505766f40a7d0eb18359e&third_from=planView\"><img src=\"http://gss0.baidu.com/6b1IcTe9R1gBo1vgoIiO_jowehsv/maps/services/thumbnails?width=200&height=150&quality=100&align=middle,middle&src=http://gss0.baidu.com/7LsWdDW5_xN3otqbppnN2DJv/lvpics/pic/item/3b292df5e0fe9925ca9f7d4f36a85edf8db17119.jpg\" alt=\"马累市场图片，游玩图片\"></a></div></div></section><div><div></div> <div>两地距离：0.1 公里 时间：步行约2分钟 <a target=\"_blank\" href=\"https://www.google.com/maps/dir/4.177814,73.509846/4.1773,73.51023\">[查看交通]</a></div></div></div><div><div id=\"eb45ea7a429e93e13e63c7fd-6\"></div><section><header><div></div><div><a pb-id=\"sceneView_2\" href=\"http://lvyou.baidu.com/guojiabowuguanhesudangongyuan?ext_from=plan&innerfr_pg=planDetailPg&from_id=412505766f40a7d0eb18359e&third_from=planView\" target=\"_blank\">国家博物馆和苏丹公园</a></div></header><div><div><div><p>建议游玩时间1-2小时</p></div></div><div></div></div></section></div></section><section><div><div><div id=\"view-day-d7952c8f002dde5809fdd2fd\"></div><header><div>02第2天可可棕榈波杜希蒂岛</div></header><footer><p>楼主是夏季前往，建议看下我刚为你写的夏季选岛攻略，百度这个行程计划不是很方便的阐述。http://lvyou.baidu.com/notes/17e6f81a43104db4f31dfc6f 建议在这2个岛屿里面选择。</p></footer><div><div id=\"d7952c8f002dde5809fdd2fd-1\"></div><section><header><div></div><div><a pb-id=\"sceneView_2\" href=\"http://lvyou.baidu.com/kekezonglvboduxididao?ext_from=plan&innerfr_pg=planDetailPg&from_id=412505766f40a7d0eb18359e&third_from=planView\" target=\"_blank\">可可棕榈波杜希蒂岛</a></div></header><div><div></div></div></section></div><div><div id=\"d7952c8f002dde5809fdd2fd-2\"></div><section><header><div></div><div>港丽</div></header><div></div></section></div></div></div></section><section><div><div><div id=\"view-day-9e85b9c4dcacd8c966c17f04\"></div><header><div>03第3天可可棕榈波杜希蒂岛</div></header><div><div id=\"9e85b9c4dcacd8c966c17f04-1\"></div><section><header><div></div><div><a pb-id=\"sceneView_2\" href=\"http://lvyou.baidu.com/kekezonglvboduxididao?ext_from=plan&innerfr_pg=planDetailPg&from_id=412505766f40a7d0eb18359e&third_from=planView\" target=\"_blank\">可可棕榈波杜希蒂岛</a></div></header><div><div></div></div><div><p>楼主的个人预算是3000，说实话根本去不了马代。马代没法穷游，当然有人说穷了，我只能说你只能住居民岛，你感受的是另一面的马代。而旅游中说的马代是 奢华的酒店服务设施和一岛一酒店的唯美风格。</p></div></section></div><div><div id=\"9e85b9c4dcacd8c966c17f04-2\"></div><section><header><div></div><div>港丽</div></header><div></div><div><p>所以楼主应该多看一下攻略。 马尔代夫人均一般来说所有费用中等在1万5左右。 4星的酒店在酒店活动给力的时候可以做到8000-1万左右1个人含机票。</p></div></section></div></div></div></section><section><div><div><div id=\"view-day-ed51cb359ba2fa2466515304\"></div><header><div>04第4天</div></header><footer><p>1.跳岛游（马累游、居民岛游览、无人岛野餐或浮潜、参观其他度假村） 2.潜水（个人浮潜、有组织的出海浮潜、深潜） 3.水边运动（帆船、冲浪、香蕉船、水上摩托、降落伞、橡皮艇） 4.出海项目（海钓、看海豚） 5.岛上运动（沙滩排球、沙滩足球、电玩、健身房、台球、乒乓、游泳、远足） 6.格调项目（SPA、游艇出海） 7.度假模式（发呆、懒散、晒晒太阳、看看小说、喝喝饮料） 8.酒店组织（音乐晚会、比赛晚会、各种主题美食） 9.特别需求（婚纱摄影、婚礼仪式）</p></footer><div><div id=\"ed51cb359ba2fa2466515304-1\"></div><section><header><div></div><div>活动大概</div></header><div></div><div><p>这里给楼主列出 马尔代夫一般怎么玩？</p></div></section></div></div></div></section><section><div><div><div id=\"view-day-782b78a2fa24665104f55204\"></div><header><div>05第5天</div></header><footer><p>如果楼主还有不清楚的地方 欢迎提问。</p></footer><div><div id=\"782b78a2fa24665104f55204-1\"></div><section><header><div></div><div>去马尔代夫多少钱？</div></header><div></div><div><p>选择自己能力范围内的预算规划，才能玩的轻松和尽兴。旅游预算主要分为两部分支出：往返机票、酒店及酒店内活动的花费。 马尔代夫开发的度假岛屿众多，档次也从3星一直到超5星。星级影响着价格、你的出行日期（淡旺季）影响着价格、度假天数影响着价格、房型影响着价格、小到水飞OR快艇影响着价格、全餐OR半餐影响着价格、此岛在你出行的日期是否有住4付费3也影响着支出的价格、你选择航班影响着价格、你的出发地直接影响着交通价格。这一系列因素左右着总费用。所以应该反问自己，这次度假去马尔代夫我准备用多少钱？根据预算再来决定去马尔代夫何种岛屿。 2015年5-7月马尔代夫价格展示（大概） 全部为2沙2水混住双人总费用（含机票）的预估价格。三星1.6-2万 四星2-2.5万 五星2.5-3.5万 超五星3.5万以上</p></div></section></div></div></div></section><section><div><div><div id=\"view-day-cd9fa09e93e13e636ce5c6fd\"></div><header><div>06第6天</div></header><div><div id=\"cd9fa09e93e13e636ce5c6fd-1\"></div><section><header><div></div><div>马尔代夫岛屿大全</div></header><div></div><div><p>马尔代夫岛屿大全 超5星至尊：W宁静岛、瑞喜敦、第六感索妮瓦富士（全沙屋）、香格里拉、柏悦哈达哈、唯一岛、尼亚玛岛、肯尼呼啦、JV岛、JD岛、芙花芬岛、姬丽岛（全水屋）、四季兰达、四季库达、都喜天阙、阿雅达、吉哈瓦/AKV、白马、维拉私人 5星奢华：吉塔丽、泰姬珊瑚、泰姬魅力、维拉曼都、维丽甘杜、维拉沙鲁、玛娜法鲁、太阳岛、满月岛、鲁滨逊岛、天堂岛、棕榈海滩岛（全沙屋，沙滩非常美，2公里长）、尼卡岛、娜拉杜岛、蜜莉喜岛、蜜月岛、曼德芙仕岛、力士岛、莉莉岛、椰子岛、库拉玛蒂岛、吉哈德岛、神仙珊瑚岛、伊露岛、幸福岛（全沙屋）、甘格西岛、钻石岛、康斯坦斯魔富士岛、康斯坦斯哈拉维丽岛、港丽岛、可可阿岛、杜妮可鲁、波杜希蒂、卡尼岛、中央格兰德、巴洛斯岛、悦榕庄瓦宾法鲁（全沙屋）、班度士、维拉瓦鲁、伊葫鲁（全沙屋）、安纳塔拉薇莉岛、安纳塔拉笛古岛、蜜杜帕茹岛（全沙屋）、瓦杜岛（全水屋） 4星豪华：美露丽芙、蕉叶岛、皇家岛（全沙屋）、里希微莉岛（全沙屋）、瑞提海滩岛、拉维丽岛（全沙屋）、双鱼岛、古丽都岛、卡曼都岛、月桂岛、假日岛（全沙屋）、康杜玛岛、海尔格兰岛（全沙屋）、菲丽兹优岛、艾来度岛、梦幻岛、阿里玛萨岛、白金岛（全沙屋） 3星经济：维丽都、蓝色美人蕉、马库努都岛（全水屋）、玛杜加里岛（全沙屋）、玛雅富士岛、菲哈后岛、艾瑞雅度岛（全沙屋）、茵布杜岛、笛基丽岛、哈库拉岛、比亚度（全沙屋）、巴萨拉岛（全沙屋）、安嘎嘎、绚丽岛</p></div></section></div></div></div></section>",
            "tourism_phone": "15559757455",
            "tourism_name": "净地旅行",
            "mall_type": "2",
            "created_at": "2018-06-12 13:47:53",
            "updated_at": "2018-06-12 13:47:53",
            "deleted_at": null
        }
    ]
}
```

## 获取民族风俗信息
### 基本信息
#### 获取所有境外游信息
```json
接口地址后缀：abroads
请求类型：GET
请求头包含字段：token、openid
```
#### 获取单个境外信息
```json
接口地址后缀：abroads/{id?}
请求类型：GET
请求头包含字段：token、openid
```
### 数据库字段说明
```json
-- auto-generated definition
create table articles
(
  id               int unsigned auto_increment
    primary key,
  article_title    varchar(255) null
  comment '文章标题',
  article_pic      varchar(255) null
  comment '文章缩略图',
  article_content  longtext     null
  comment '文章内容',
  article_foot_pic varchar(255) null
  comment '文章底部图片',
  article_type     varchar(255) null
  comment '文章分类',
  article_click    int          null
  comment '文章点击量',
  created_at       timestamp    null,
  updated_at       timestamp    null,
  deleted_at       timestamp    null
)
  collate = utf8mb4_unicode_ci;
```
### 返回结果示例
```json
{
    "status": "接口请求成功！",
    "status_code": 200,
    "data": [
        {
            "id": 8,
            "article_title": "香港年俗",
            "article_pic": "images/xianggang.jpeg",
            "article_content": "<p></p><p></p><div label-module=\"para\">农历新年是我国传统上一个盛大的节日，相信无一个中国人不识。然而，在香港过农历年，习俗上和气氛上却和传统的截然不同。</div><div label-module=\"para\">近年来，已经很少香港人在农历新年时按传统在家里贴<a target=\"_blank\" href=\"https://baike.baidu.com/item/%E6%98%A5%E8%81%94\">春联</a>、<a target=\"_blank\" href=\"https://baike.baidu.com/item/%E5%B9%B4%E7%94%BB\">年画</a>的了，取而代之的则在一些商店或家中贴上“生意兴隆”、“出入平安”等的挥春。虽然如此，但贴挥春的原意和贴春联和年画一样，取其吉利之意，希望来年事事顺利，平平安安。</div><div label-module=\"para\">此外，舞狮、舞龙灯等也会在一些新乡村、围村中出现，在新年的市区街头上也很难看到的大型的舞狮、舞龙灯的表演了。至于放炮仗、鞭炮等在香港是一律禁止的，不过自一九八二年开始每年农历年初二的晚上，在<a target=\"_blank\" href=\"https://baike.baidu.com/item/%E7%BB%B4%E5%A4%9A%E5%88%A9%E4%BA%9A%E6%B8%AF\">维多利亚港</a>上都会举行盛大的烟花表演，这已成为这十多年来迎春的一个节目了。</div><div label-module=\"para\">香港被称为“美食天堂”，春节有关吃的习俗也不少，而大部分家庭也会在春节期间吃“团年饭”，一般是在家里设宴，于除夕全家上上下下、里里外外聚在一起，享受晚饭。而饭后的一大节目，首选就是逛花市了，农历新年期间，港九多处都设有年宵市场，其中以<a target=\"_blank\" href=\"https://baike.baidu.com/item/%E7%BB%B4%E5%A4%9A%E5%88%A9%E4%BA%9A%E5%85%AC%E5%9B%AD\">维多利亚公园</a>的花市最大、最热闹。香港市民习惯于晚饭后一家大小逛花市，除夕夜时更是人山人海，摩肩接踵，大家一起欢度佳节。</div><div label-module=\"para\">在香港过农历新年，最开心的莫过于收“利市”的小孩子了，在春节拜年时，到处可以听到讨“利市”的欢笑声。“利市”就是红包原为“利事”，取大吉大利宽好意头，同时也成为了春节时与亲人不可缺少的习俗。</div><p><div label-module=\"para-title\"><img src=\"http://yxz.ynshuke.com/uploads/images/1528812641ho5eKL.jpeg\" style=\"max-width:100%;\"><img src=\"http://yxz.ynshuke.com/uploads/images/1528812641ichthU.jpeg\" style=\"max-width: 100%;\"><img src=\"http://yxz.ynshuke.com/uploads/images/1528812641PFxfGP.jpeg\" style=\"max-width: 100%;\"><br></div></p><div><a name=\"2\"></a><a name=\"sub1469698_2\"></a><a name=\"澳门年俗\"></a></div>",
            "article_type": "4",
            "article_click": 5435,
            "created_at": "2018-06-12 14:10:47",
            "updated_at": "2018-06-12 14:10:47",
            "deleted_at": null
        },
        {
            "id": 9,
            "article_title": "澳门年俗",
            "article_pic": "images/anmen.jpeg",
            "article_content": "<p></p><div label-module=\"para\">澳门年俗，别有风情。 \"谢灶\"是澳门保存下来最传统的中国年俗之一。腊月二十三日送灶神，澳门人谓之\"谢灶\"。澳门人给灶神按中国传统也用灶糖，说是用糖糊住灶神之嘴，免得灶神到玉帝面前说坏话。我在澳门花街的一澳门人家的灶头见过一张圣诞老人像，奇怪的是，圣诞老人像边贴着\"上天言好事，回宅降吉祥\"的联儿。</div><div label-module=\"para\">澳门人过年是从腊月二十八开始的，腊月二十八日在粤语中谐言\"易发\"，商家老板大都在这岁晚之时请员工吃\"团年饭\"以示财运亨通，吉祥如意。澳门的年味，从腊月二十八这天便能真切的感受到的。</div><div label-module=\"para\">除夕之夜，守岁和逛花市是澳门人辞旧迎新的两件大事。守岁是打麻将，看电视，叙旧聊天，共享天伦之乐；大概受西方圣诞节和<a target=\"_blank\" href=\"https://baike.baidu.com/item/%E6%83%85%E4%BA%BA%E8%8A%82\">情人节</a>的影响，年宵澳门人还争相购买一些吉祥的花木迎接新春，现今已成了一个澳门年俗。澳门在年宵兴办花市，多是桃花，<a target=\"_blank\" href=\"https://baike.baidu.com/item/%E6%B0%B4%E4%BB%99\">水仙</a>、盆竹、盆桔，花开富贵，竹报平安，鲜花瑞木兆示着新年的美好前程。澳门的花市办三天，这三天给奔波一年的澳门人无穷的慰藉。</div><div label-module=\"para\">春节这天，澳门人讲究\"利市\"，\"利市\"就是红包，这天老板见到员工，长辈见到晚辈，甚至已婚人见到未婚人都得\"利市\"。\"利市\"纯粹是以示吉利。 澳门人把大年初二叫作\"开年\"。习俗是要吃\"开年\"饭，这餐饭必备发菜、生菜、鲤鱼，意在取其生财利路。从\"开年\"这天起，三天内澳门政府允许公务员\"博彩\"（赌博）。 \"开年\"过后，澳门又完全回到中国传统春节习俗中，直至元宵佳节，也是烟节爆竹，玩龙舞狮，欢天喜地。</div><p><img src=\"http://yxz.ynshuke.com/uploads/images/1528812746dkiLmV.jpeg\" style=\"max-width:100%;\"><img src=\"http://yxz.ynshuke.com/uploads/images/15288127466TFKpk.jpeg\" style=\"max-width: 100%;\"><img src=\"http://yxz.ynshuke.com/uploads/images/1528812746BnfD4U.jpeg\" style=\"max-width: 100%;\"><br></p>",
            "article_type": "4",
            "article_click": 345,
            "created_at": "2018-06-12 14:12:33",
            "updated_at": "2018-06-12 14:12:33",
            "deleted_at": null
        }
    ]
}

or

{
    "status": "接口请求失败！",
    "status_code": 100,
    "msg": "数据库操作失败！"
}
```

## 预约信息接口
### 基本信息([什么是resource？](https://sixos.io/blog/resource.html))
#### 获取该用户所有的预约信息
```json
接口地址后缀：subscribes
请求类型：GET
请求头包含字段：token、openid
```
#### 获取该用户单个的预约信息
```json
接口地址后缀：subscribes/{id?}
请求类型：GET
请求头包含字段：token、openid
```
#### 创建一条该用户下的预约信息
```json
接口地址后缀：subscribes
请求类型：POST
请求头包含字段：token、openid
```

### 数据库字段说明
```json
-- auto-generated definition
create table subscribes
(
  id              int unsigned auto_increment
    primary key,
  name            varchar(255) not null
  comment '预约人',
  phone           varchar(255) not null
  comment '预约人电话',
  remark          varchar(255) null
  comment '备注',
  status          varchar(255) null
  comment '状态',
  operator        varchar(255) null
  comment '后台操作者',
  operator_remark varchar(255) not null
  comment '后台操作者备注',
  created_at      timestamp    null,
  updated_at      timestamp    null,
  deleted_at      timestamp    null
)
  collate = utf8mb4_unicode_ci;
```

### 返回数据示例
#### 查询所有预约信息
```json
{
    "status": "接口请求成功！",
    "status_code": 200,
    "data": [
        {
            "id": 1,
            "name": "李江江",
            "phone": "15559757745",
            "remark": "麻烦帮忙办理一个签证，请尽快联系我，急用",
            "status": "待处理",
            "operator": null,
            "operator_remark": null,
            "created_at": "2018-06-12 12:59:14",
            "updated_at": "2018-06-12 13:00:25",
            "deleted_at": null,
            "openid": "o1f5_4nPMp_XcOIzh_5kVlantics"
        },
        {
            "id": 2,
            "name": "李江江",
            "phone": "15559757745",
            "remark": "麻烦帮忙办理一个签证，请尽快联系我，急用",
            "status": "待处理",
            "operator": null,
            "operator_remark": null,
            "created_at": "2018-06-12 12:59:14",
            "updated_at": "2018-06-12 13:00:25",
            "deleted_at": null,
            "openid": "o1f5_4nPMp_XcOIzh_5kVlantics"
        }
    ]
}
```

#### 查询单个预约信息
```json
{
    "status": "接口请求成功！",
    "status_code": 200,
    "data": [
        {
            "id": 1,
            "name": "李江江",
            "phone": "15559757745",
            "remark": "麻烦帮忙办理一个签证，请尽快联系我，急用",
            "status": "待处理",
            "operator": null,
            "operator_remark": null,
            "created_at": "2018-06-12 12:59:14",
            "updated_at": "2018-06-12 13:00:25",
            "deleted_at": null,
            "openid": "o1f5_4nPMp_XcOIzh_5kVlantics"
        }
    ]
}
```

#### 接口调用失败返回信息
```json
{
    "status": "接口请求失败！",
    "status_code": 100,
    "msg": "数据库操作失败！"
}
```

## 获取活动信息接口
### 基本信息([什么是resource？](https://sixos.io/blog/resource.html))
#### 获取所有活动信息
```json
接口地址后缀：activities
请求类型：resource
请求头包含字段：token、openid
```
#### 获取单个活动信息
```json
接口地址后缀：activities/{id?}
请求类型：resource
请求头包含字段：token、openid
```

### 返回信息示例
#### 获取所有活动信息
```json
{
    "status": "接口请求成功！",
    "status_code": 200,
    "data": [
        {
            "id": 7,
            "article_title": "“让世界倾听陕西声音”主题采访活动在西安启动",
            "article_pic": "images/huodong.jpg",
            "article_content": "<p></p><p>6月12日上午，由中共陕西省委网信办、中国互联网新闻中心、西安市互联网信息办公室主办，中国网丝路中国频道承办，西安浐灞生态区管理委员会协办的“‘陕’耀新时代　领航新丝路　遇见大西安——让世界倾听陕西声音”主题采访活动在西安浐灞生态区正式启动。<br></p><p><img src=\"http://p1.img.cctvpic.com/photoworkspace/contentimg/2018/06/12/2018061213162254418.jpg\" style=\"max-width:100%;\"><br></p><p>　6月12日上午，“‘陕’耀新时代　领航新丝路　遇见大西安——让世界倾听陕西声音”主题采访活动启动仪式在西安浐灞生态区城建博物馆举行。(安鑫　摄)</p><p>　　中共陕西省委网信办主任鲍永能，中国互联网新闻中心副主任李富根，中共西安市委常委、宣传部部长吴键，西安市委办公厅副主任、市网信办主任刘新锋，西安浐灞生态区管理委员会副主任王公理等领导出席启动仪式。第三届丝博会执委会副主任兼秘书长、陕西省会展中心党委书记、主任李建义，中共宝鸡市委常委、宣传部部长马鲜萍作为特邀嘉宾出席本次活动。活动现场还邀请到了新华网副总编辑刘加文，央视网副总编辑陈剑英，中国日报网总编辑韩蕾，中国经济网副总编辑胡晓晶，光明网副总经理宋乐永，中国青年网总编助理陈华，人民画报副总编辑王磊，中新网社交媒体中心总监王凯等中央媒体单位主要负责人出席。</p><p><img src=\"http://p1.img.cctvpic.com/photoworkspace/contentimg/2018/06/12/2018061213165728810.jpg\" style=\"max-width:100%;\"><br></p><p>　　鲍永能在致辞中表示，陕西历史文化厚重，自然资源富集，生态环境优美、经济发展潜能强大，创新驱动基础坚实。随着“一带一路”建设，陕西迎来了前所未有的发展机遇。进入新时代，在省委省政府的坚强领导下，三秦大地正在全面贯彻落实习近平新时代中国特色社会主义思想和党的十九大精神，紧盯追赶超越目标，努力践行五个扎实要求，认真实施培育新动能，构筑新高地，激发新活力，共建新生活，彰显新形象的“五新”战略任务。大力发展枢纽经济、门户经济、流动经济，奋力谱写新时代追赶超越的新篇章。本次采访活动紧扣庆祝改革开放40周年主题，聚焦陕西、推动新时代追赶超越所展现的新气象、新作为，向世界发出陕西好声音。期待采访活动充分聚合中央主流媒体宣传优势，以全媒体手段，用多语种宣传陕西人民迎难而进的典型事例和生动实践，展示陕西在开启全面建设社会主义现代化国家新征程的探索，通过互联网让世界倾听陕西、了解陕西，爱上陕西。<br></p><p><img src=\"http://p1.img.cctvpic.com/photoworkspace/contentimg/2018/06/12/2018061213172314213.jpg\" style=\"max-width:100%;\"><br></p><p><br></p>",
            "article_type": "2",
            "article_click": 430,
            "created_at": "2018-06-12 13:32:16",
            "updated_at": "2018-06-12 13:32:28",
            "deleted_at": null
        },
        {
            "id": 10,
            "article_title": "这是一个活动信息",
            "article_pic": "images/lvyouluxian.jpeg",
            "article_content": "<p></p><p><img src=\"http://yxz.ynshuke.com/uploads/images/1528815049tO5cTf.jpeg\" style=\"max-width:100%;\"><br></p><h2><span style=\"color: rgb(194, 79, 74);\">上述旅游路线限时免费七日游</span></h2>",
            "article_type": "2",
            "article_click": 435,
            "created_at": "2018-06-12 14:51:32",
            "updated_at": "2018-06-12 14:51:32",
            "deleted_at": null
        }
    ]
}
```

#### 获取单挑活动信息
```json
{
    "status": "接口请求成功！",
    "status_code": 200,
    "data": [
        {
            "id": 7,
            "article_title": "“让世界倾听陕西声音”主题采访活动在西安启动",
            "article_pic": "images/huodong.jpg",
            "article_content": "<p></p><p>6月12日上午，由中共陕西省委网信办、中国互联网新闻中心、西安市互联网信息办公室主办，中国网丝路中国频道承办，西安浐灞生态区管理委员会协办的“‘陕’耀新时代　领航新丝路　遇见大西安——让世界倾听陕西声音”主题采访活动在西安浐灞生态区正式启动。<br></p><p><img src=\"http://p1.img.cctvpic.com/photoworkspace/contentimg/2018/06/12/2018061213162254418.jpg\" style=\"max-width:100%;\"><br></p><p>　6月12日上午，“‘陕’耀新时代　领航新丝路　遇见大西安——让世界倾听陕西声音”主题采访活动启动仪式在西安浐灞生态区城建博物馆举行。(安鑫　摄)</p><p>　　中共陕西省委网信办主任鲍永能，中国互联网新闻中心副主任李富根，中共西安市委常委、宣传部部长吴键，西安市委办公厅副主任、市网信办主任刘新锋，西安浐灞生态区管理委员会副主任王公理等领导出席启动仪式。第三届丝博会执委会副主任兼秘书长、陕西省会展中心党委书记、主任李建义，中共宝鸡市委常委、宣传部部长马鲜萍作为特邀嘉宾出席本次活动。活动现场还邀请到了新华网副总编辑刘加文，央视网副总编辑陈剑英，中国日报网总编辑韩蕾，中国经济网副总编辑胡晓晶，光明网副总经理宋乐永，中国青年网总编助理陈华，人民画报副总编辑王磊，中新网社交媒体中心总监王凯等中央媒体单位主要负责人出席。</p><p><img src=\"http://p1.img.cctvpic.com/photoworkspace/contentimg/2018/06/12/2018061213165728810.jpg\" style=\"max-width:100%;\"><br></p><p>　　鲍永能在致辞中表示，陕西历史文化厚重，自然资源富集，生态环境优美、经济发展潜能强大，创新驱动基础坚实。随着“一带一路”建设，陕西迎来了前所未有的发展机遇。进入新时代，在省委省政府的坚强领导下，三秦大地正在全面贯彻落实习近平新时代中国特色社会主义思想和党的十九大精神，紧盯追赶超越目标，努力践行五个扎实要求，认真实施培育新动能，构筑新高地，激发新活力，共建新生活，彰显新形象的“五新”战略任务。大力发展枢纽经济、门户经济、流动经济，奋力谱写新时代追赶超越的新篇章。本次采访活动紧扣庆祝改革开放40周年主题，聚焦陕西、推动新时代追赶超越所展现的新气象、新作为，向世界发出陕西好声音。期待采访活动充分聚合中央主流媒体宣传优势，以全媒体手段，用多语种宣传陕西人民迎难而进的典型事例和生动实践，展示陕西在开启全面建设社会主义现代化国家新征程的探索，通过互联网让世界倾听陕西、了解陕西，爱上陕西。<br></p><p><img src=\"http://p1.img.cctvpic.com/photoworkspace/contentimg/2018/06/12/2018061213172314213.jpg\" style=\"max-width:100%;\"><br></p><p><br></p>",
            "article_type": "2",
            "article_click": 430,
            "created_at": "2018-06-12 13:32:16",
            "updated_at": "2018-06-12 13:32:28",
            "deleted_at": null
        }
    ]
}
```

#### 失败信息
```json
{
    "status": "接口请求失败！",
    "status_code": 100,
    "msg": "数据库操作失败！"
}
```