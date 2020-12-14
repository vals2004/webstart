FROM mysql:5.7
  
VOLUME ["/var/lib/mysql"]

RUN echo Europe/Kiev > /etc/timezone && \
    dpkg-reconfigure -f noninteractive tzdata

EXPOSE 3306
