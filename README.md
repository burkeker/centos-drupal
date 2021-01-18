**REPOSITORY ARCHIVED.**

centos-drupal
=============

This is an attempt of sharing development environment which reduces the cost of maintaining a local LAMP stack and avoid confusion due to slightly different configurations among developers. It is built for continuous delivery/integration of the Drupal web layer within GBIF Secretariat.

Please note that the Drupal content is not accessible to non-staff of GBIFS. You may use the 'drupal' role, instead of 'gbif-drupal', to setup with a standard Drupal profile.

This project uses:
- [**Vagrant**](http://www.vagrantup.com/downloads) for building the development environment, with *vagrant-hostsupdater* plugin required;
- [**Ansible**](http://docs.ansible.com/intro_installation.html) for configuration management;
- [**VirtualBox**](https://www.virtualbox.org/wiki/Downloads) as the hosting machine;
- **CentOS 6.5** as the hosted virtual machine;
- [**PHPStorm**](http://www.jetbrains.com/phpstorm/) as the integrated development environment.

The above also explains the prerequisites before you start. Once ready, the following steps will give you a fully functioning GBIF Drupal web layer, excluding the data search pages and GBIF API:

1. `$ git clone https://github.com/burkeker/centos-drupal.git && cd centos-drupal`

2. `cp provisioning/example-settings.yml provisioning/settings.yml`
    - Create provisioning/settings.yml by copying provisioning/example-settings.yml;
    - Review settings;
    - Locally, make sure you don't have ~/dev/git/gbif-drupal, which will be created to sync with Drupal files remotely from the virtual machine.

3. `vagrant up`

That's it.

Visit [http://d7.centos-dev.local](http://d7.centos-dev.local) or [http://localhost:8083](http://localhost:8083)to visit the website. For the first visit it will take short while to load. After a few click-around the website should run with normal performance.

### Debug
This is still yet well tested. For now try import phpstorm/settings.jar.
