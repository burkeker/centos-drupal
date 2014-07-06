centos-drupal	{#welcome}
=============

This is an attempt of sharing development environment which reduces the cost of maintaining a local LAMP stack and avoid confusion due to slightly different configurations among developers. It is built for continuous delivery/integration of the Drupal web layer within GBIF Secretariat.

This project uses:
- [**Vagrant**](http://www.vagrantup.com/downloads) for building the development environment, with *vagrant-hostsupdater* plugin required;
- [**Ansible**](http://docs.ansible.com/intro_installation.html) for configuration management;
- [**VirtualBox**](https://www.virtualbox.org/wiki/Downloads) as the hosting machine;
- **CentOS 6.5** as the hosted virtual machine;
- [**PHPStorm**](http://www.jetbrains.com/phpstorm/) as the integrated development environment.

The above also explains the prerequisites before you start. Once ready, the following steps will give you a fully functioning GBIF Drupal web layer, excluding the data search pages and GBIF API:
1. `$ git clone https://github.com/burkeker/centos-drupal.git`
2. `cd centos-drupal`
    - Create provisioning/settings.yml by copying provisioning/example-settings.yml;
    - Review settings;
    - Make sure you don't have ~/dev/git/gbif-drupal, which will be created to sync with Drupal files from inside the virtual machine.
3. `vagrant up`

That's it.

Visit [http://d7.centos-dev.local](http://d7.centos-dev.local) or [http://localhost:8083](http://localhost:8083)to visit the website. For the first visit it will take short while to load. After a few click-around the website should run with normal performance.

###Debug {#debug}
This part is still yet well tested. For now try import phpstorm/settings.jar.