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
 - `1688`: kms

 
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
 - frp.yimian.xyz
 - onedrive.yimian.xyz
 - shorturl.yimian.xyz
 - eee.dog
 - dns.yimian.xyz
 - acg.watch

## dokcer集群
```docker-compose.yml

```

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


## docker集群
```yml
version: '3'
services:

# system-level services
#--------------------------------
  nginx:
    image: iotcat/ushio-nginx
    container_name: nginx
    restart: always
    ports:
      - "80:80"
      - "443:443"
    volumes:
      - "/mnt/etc/cn.yimian.xyz/nginx/:/etc/nginx/"
      - "/mnt/:/mnt/"
      - "/var/log/nginx/:/var/log/nginx/"
      - "/home/www/:/home/www/"
    #network_mode: "host"
    depends_on:
      - oneindex
      - php-fpm
      - frps
      - session
      - acg.watch-api
      - serverstatus
      - ushio-win-server
      - danmaku-api
      - coro-api
      - todo-ddl-api
      - upload-api
    networks:
      - default
      - php_net
      - frp_net

  dns:
    image: strm/dnsmasq
    restart: always
    volumes:
      - /mnt/config/dnsmasq/dnsmasq.conf:/etc/dnsmasq.conf
      - /mnt/config/dnsmasq/dnsmasq.d/:/etc/dnsmasq.d/
      - /mnt/config/dnsmasq/hosts.conf:/etc/hosts.conf
    ports:
      - "53:53/udp"
      - "53:53/tcp"
    cap_add:
      - NET_ADMIN
    networks:
      - dns_net

# Database
#----------------------------------
  redis:
    image: redis
    container_name: redis
    restart: always
    volumes:
      - "/tmp/redis/data/:/data/"
    ports:
      - "6379:6379"
    networks:
      - redis_net
  mongo:
    image: mongo
    container_name: mongo
    restart: always
    volumes:
      - "/var/mongo:/data/db"
    networks:
      - mongo_net


# app-level services
# --------------------------------------
  php-fpm:
    container_name: php-fpm
    image: crunchgeek/php-fpm:7.3
    restart: always
    volumes:
      - "/home/:/home/"
      - "/mnt/:/mnt/"
    networks:
      - php_net
  frps:
    image: snowdreamtech/frps
    container_name: frps
    restart: always
    volumes:
      - "/mnt/config/frp/frps.ini:/etc/frp/frps.ini"
    ports:
      - "4480:4480"
      - "4443:4443"
      - "4477:4477"
      - "4400-4440:4400-4440"
    networks:
      - frp_net
  emqx:
    image: emqx/emqx
    container_name: emqx
    restart: always
    ports:
      - "1883:1883"
      - "8083:8083"
      - "8883:8883"
      - "8084:8084"
      - "18083:18083"
    networks:
      - mqtt_net
  monitor:
    #build: https://github.com/iotcat/ushio-monitor.git
    image: iotcat/ushio-monitor
    container_name: monitor
    restart: always
    command: USER=cn.yimian.xyz
    network_mode: "host"


# common apps
# -------------------------------------
  oneindex:
    image: iotcat/oneindex
    container_name: oneindex
    restart: always
    volumes:
      - "/mnt/config/oneindex/:/var/www/html/config/"
    healthcheck:
      test: /bin/bash /healthcheck.sh
      interval: 1m
      timeout: 10s
      retries: 3

  session:
    #build: https://github.com/iotcat/ushio-session.git
    image: iotcat/ushio-session
    container_name: session
    restart: always
    networks:
      - default
      - redis_net
  acg.watch-api:
    #build: https://github.com/iotcat/acg.watch-api.git
    image: iotcat/acg.watch-api
    container_name: acg.watch-api
    restart: always
    volumes:
      - "/mnt/cache/video/:/mnt/cache/video/"
 



# local apps
# ---------------------------------------
  serverstatus:
    image: cppla/serverstatus
    container_name: serverstatus
    restart: always
    volumes:
      - "/mnt/config/serverstatus/config.json:/ServerStatus/server/config.json"
    ports:
      - "35601:35601"
  ushio-win-server:
    #build: https://github.com/iotcat/ushio-win-server.git
    image: iotcat/ushio-win-server
    container_name: ushio-win-server
    restart: always
  kms:
    #build: https://github.com/iotcat/kms-dockcer.git
    image: iotcat/kms
    container_name: kms
    restart: always
    ports:
      - "1688:1688"
  bingimgupdate-opt:
    #build: https://github.com/iotcat/bingUpdateImg-opt.git
    image: iotcat/bingimgupdate-opt
    container_name: bingimgupdate-opt
    restart: always
    volumes:
      - "/mnt/config/token/huaweicloud/:/mnt/config/token/huaweicloud/"
      - "/tmp/:/tmp/"
  danmaku-api:
    #build: https://github.com/iotcat/danmaku-api.git
    image: iotcat/danmaku-api
    container_name: danmaku-api
    restart: always
    depends_on:
      - redis
      - mongo
    networks:
      - default
      - redis_net
      - mongo_net
    environment:
      REDIS_HOST: "redis"
      REDIS_PORT: 6379
      MONGO_HOST: "mongo"
      MONGO_PORT: 27017
      MONGO_DATABASE: "danmaku"
    volumes:
      - /var/log/danmaku-api/app:/usr/src/app/logs
      - /var/log/danmaku-api/pm2:/root/.pm2/logs
  coro-api:
    #build: https://github.com/iotcat/coro-api.git
    image: iotcat/coro-api
    container_name: coro-api
    restart: always
  todo-ddl-api:
    #build: https://github.com/iotcat/todo-ddl-api.git
    image: iotcat/todo-ddl-api
    container_name: todo-ddl-api
    restart: always
    volumes:
      - "/mnt/var/todo-ddl/:/mnt/var/todo-ddl/"
  upload-api:
    #build: https://github.com/IoTcat/upload-api.git
    image: iotcat/upload-api
    container_name: upload-api
    restart: always
    volumes:
      - "/mnt/config/token/huaweicloud/:/mnt/config/token/huaweicloud/"
    tmpfs:
      - /tmp

    
    
# networks setting
# ------------------------------------
networks:
  default:

  dns_net:

  redis_net:

  mongo_net:

  php_net:

  frp_net:

  mqtt_net:

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
 - 部署ushio-monitor
 - 接入serverstatus
 
--------------------------------
**2020-6-19**
 - 接入oneindex
 - 接入kms
 - 接入acg.watch
 - 接入oneindex
 - 部署frp
 - 部署shorturl
 - 部署dnsmasq
 
-------------------------------------
