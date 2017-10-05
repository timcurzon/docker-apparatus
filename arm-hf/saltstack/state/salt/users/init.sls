{% for user, uid in pillar.get('users', {}).items() %}
adduser -D -u {{uid}} {{user}}:
  cmd.run
{% endfor %}
