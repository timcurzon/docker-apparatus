nginx:
  pkg.installed:
    - cache_valid_time: 600
    - refresh: True
  service.running:
    - require:
      - pkg: nginx
