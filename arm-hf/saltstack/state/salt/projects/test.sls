test project:
  git.latest:
    - name: https://gitlab.com/[username]/[reponame].git
    - target: /projects/test
    - https_pass: [token]
    - rev: master
    - force_reset: True
    - require:
      - pkg: git

