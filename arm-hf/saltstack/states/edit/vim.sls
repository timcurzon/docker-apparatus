vim:
  pkg.installed:
    - cache_valid_time: 600
    - refresh: True

/etc/vim/vimrc:
  file.managed:
    - source: salt://edit/vimrc
    - mode: 644
    - user: root
    - group: root
