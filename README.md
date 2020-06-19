# Ushio-cn

## 硬件配置
 - 华为云云服务器-北京一-可用区1-通用计算型 | s3.medium.2 | 1vCPUs | 2GB
 
## 系统配置
 - CentOS 7.4 64bit (docker-c7-40 市场镜像)

## ip地址
 - ipv4: `114.116.85.132`
 
## 端口占用
 - `22`: ssh
 - `80`: http
 - `443`: https/wss
 - '1688': kms

 
## iptables策略
```iptables
# default
iptables -A OUTPUT -j ACCEPT
iptables -A INPUT -j REJECT
iptables -A FORWARD -j REJECT
iptables -A INPUT -p icmp --icmp-type echo-request -j ACCEPT
iptables -A OUTPUT -p icmp --icmp-type echo-reply -j ACCEPT
iptables -A INPUT -i lo -j ACCEPT
iptables -A OUTPUT -o lo -j ACCEPT

# ssh
iptables -A INPUT -p tcp --dport 22 -j ACCEPT

# http & https
iptables -A INPUT -p tcp --dport 80 -j ACCEPT
iptables -A INPUT -p tcp --dport 443 -j ACCEPT

```

## 工具集环境
 - docker1.13.1
 - nodeJS
 - python 2.7.5
 - python 3.6
 - java
 - php
 - go
 
## 注册服务
 - ushio
 - rclone
 - nginx(ushio)

### NODEJS工具
 - npm
 - npx
 - n
 - cnpm
 - yarn
 - pm2
 - todo-ddl

## PYTHON工具
 - pip
 - pip3

## iis服务列表
 - api.yimian.xyz
 - img.yimian.xyz
 - log.yimian.xyz
 - onedrive.yimian.xyz
 - session.yimian.xyz
 - kms.yimian.xyz

## dokcer集群
 - redis
 - emqx


## 文件结构
```
|
|---home
|   |---lib
|   |   |---anti-ddos(iotcat/anti-ddos)
|   |   |---qcloudsms(qcloudsms/qcloudsms_php)
|   |   |---huaweicloud-sdk-php-obs(iotcat/huaweicloud-sdk-php-obs)
|   |
|   |---opt
|   |
|   |---www
|   |   |---api(iotcat/ushio-api)
|   |   |---img(iotcat/ushio-img)
|   |   |---log(iotcat/ushio-log)

```

## 操作日志
---------------------------------
**2020-6-11**   
 - 试图通过华为云面板重装系统为CentOS7.6，失败
 - 提交华为工单重装系统为CentOS7.6，不受理
 - 通过[MeowLove/Network-Reinstall-System-Modify](https://github.com/MeowLove/Network-Reinstall-System-Modify)网络安装CentOS7.6，遇到无限重启，失败
 - 通过[dansnow](https://zhujiwiki.com/13350/)的脚本重装，报错，失败
 - 放弃重装，直接使用原有系统市场镜像并重置
 - 更改主机名为`cn.yimian.xyz`
 - yum更新
 - yum安装企业库
 - yum安装工具`wget git vim unzip zip openssl make gcc gcc-c++ screen fuse fuse-devel`
 - 安装并配置 git
 - 配置docker
 - 安装docker-compose
 - 配置ushio集群为服务
 - 安装配置nodeJS
 - 清除防火墙
 - 关闭SELINUX
 - 安装配置iptables
 - 挂载onedrive
 - 链接.vimrc
 - 链接.ssh公钥
 - 链接黑名单白名单
 - 安装配置php
 - 安装php-fpm
 - 安装go
 - 安装pip
 - 安装python3
 - 安装pip3
 - 安装nginx(ushio)
 
 ----------------------------------------------
 **2020-6-12**   
 - 链接docker集群
 - 配置泛域名证书自动续期[acme.sh](https://github.com/acmesh-official/acme.sh)
 - 配置华为云存储obsutil
 - ~~挂载obsfs~~
 - 解决github的dns污染(将`199.232.69.194 assets-cdn.github.com`加入`/etc/hosts)
 ----------------------------------
 **2020-6-15**
 - 部署api.yimian.xyz
 - 部署img.yimian.xyz
 - 解决php的pdo_mysql无法找到问题
 - 卸载nginx，使用docker架构
 - 转换ushio-img到php-sdk
------------------------------
**2020-6-18**
 - 调试upload-api
 - 部署imgbed
 - 部署filebed
 - 接入log
 - 接入session
**2020-6-19**
 - 接入oneindex
 - 接入kms
