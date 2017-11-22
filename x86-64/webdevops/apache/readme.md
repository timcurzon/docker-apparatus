Webdevops Apache Container Setup
================================

1. Ensure the Docker jwilder/nginx-proxy is setup & running
  * Blog: http://jasonwilder.com/blog/2014/03/25/automated-nginx-reverse-proxy-for-docker
  * Github: https://github.com/jwilder/nginx-proxy
  * Docker hub: https://hub.docker.com/r/jwilder/nginx-proxy/
2. Ensure the proxy network has been created & the proxy is available on it
3. Update the docker-compose.env file is updated with the virtual host name the site is to be run under
4. Drop content into web/ dir
5. Done! Run docker-compose up...
