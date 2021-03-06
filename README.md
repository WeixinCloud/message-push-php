# 微信云托管·云调用示例（Node.js）

[![GitHub license](https://img.shields.io/github/license/WeixinCloud/message-push-nodejs)](https://github.com/WeixinCloud/message-push-nodejs)
![GitHub package.json dependency version (prod)](https://img.shields.io/github/package-json/dependency-version/WeixinCloud/message-push-nodejs/express)

微信云托管·云调用示例，基于 Node.js Express 框架搭建，实现小程序、公众号简易的接收、回复消息功能。

![](https://qcloudimg.tencent-cloud.cn/raw/21068367f6757057a9125458be3347d4.png)

## 快速开始

前往 [微信云托管快速开始页面](https://cloud.weixin.qq.com/cloudrun/onekey)，选择相应的模板，根据引导完成部署。

## 项目结构说明

~~~
.
├── Dockerfile                  Dockerfile 文件
├── README.md                   README 文件
├── app                         应用目录
│   ├── controller              控制器目录
│   ├── model                   模型目录
│   └── view                    视图目录
├── conf                        配置文件
│   ├── fpm.conf                fpm 配置
│   ├── nginx.conf              nginx 配置
│   └── php.ini                 php 配置
├── config                      thinkphp 配置
├── container.config.json       微信云托管流水线配置
├── public                      WEB目录（对外访问目录）
│   ├── favicon.ico             图标
│   ├── index.php               入口文件       
│   └── router.php              快速测试文件 
├── route                       路由文件			
│   └── app.php                 定义应用路由
├── run.sh                      nginx、fpm 启动
├── runtime                     应用的运行时目录（可写，可定制）
├── think                       命令行入口文件
└── vendor                      第三方类库目录
~~~

- `index.js`：项目入口，实现简易的接收、回复消息功能
- `package.json`：Node.js 项目定义文件
- `Dockerfile`：容器配置文件

## 服务 API 文档

### `POST /`

接收来自微信的消息推送，消息结构可参考 [微信文档](https://developers.weixin.qq.com/miniprogram/dev/framework/open-ability/customer-message/receive.html#%E6%96%87%E6%9C%AC%E6%B6%88%E6%81%AF)。

接收消息后，将会调用 [发送客户消息](https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/customer-message/customerServiceMessage.send.html) 接口，返回收到的消息详情。

## License

[MIT](./LICENSE)
