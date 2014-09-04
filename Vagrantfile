# -*- mode: ruby -*-
# vi: set ft=ruby :

# Drupal Deployment for GBIF Secretariat
# This project aims at building a staging workflow for the Drupal development
# in GBIF Secretariat. This is mainly for internal use as there may be settings
# that only work within the environment at GBIFS. 

# We use vagrant-hostsupdater to automatically add/remove lines in /etd/hosts
if !Vagrant.has_plugin?("vagrant-hostsupdater")
  puts "Plugin 'vagrant-hostsupdater' is required"
  puts "This can be installed by running:"
  puts
  puts " vagrant plugin install vagrant-hostsupdater"
  puts
  exit
end

# Find the current directory
vagrant_dir = File.expand_path(File.dirname(__FILE__))
conf_file = vagrant_dir + '/provisioning/settings.yml'

# Include configuration & credentials from settings.yml
require 'yaml'
conf = YAML::load_file(conf_file)

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "centos-6.5"
  #config.vm.box_url = "https://github.com/2creatives/vagrant-centos/releases/download/v0.1.0/centos64-x86_64-20131030.box"

  config.vm.box_check_update = true
  config.vm.hostname = "d" + conf['drupal_core_version'] + "." + conf['box_os'] + "-" + conf['staging_env'] + ".local"

  config.vm.network "forwarded_port", guest: 80, host: 8083

  config.vm.network "private_network", ip: conf['box_ip_address']

  # If true, then any SSH connections made will enable agent forwarding.
  # Default value: false
  # config.ssh.forward_agent = true

  # Share an additional folder to the guest VM. The first argument is
  # the path on the host to the actual folder. The second argument is
  # the path on the guest to mount the folder. And the optional third
  # argument is a set of non-required options.
  # config.vm.synced_folder "../data", "/vagrant_data"
  # Setting permission on synced_folder doesn't work on VirtualBox.
  #config.vm.synced_folder "~/dev/git/gbif-drupal", "/var/www/d7", create: true, owner: conf['http_user'], group: conf['http_group'], mount_options: ["dmode=755", "fmode=644"]
  #config.vm.synced_folder "~/dev/git/gbif-drupal", "/var/www/d7", create: true, type: "nfs"

  config.vm.provider "virtualbox" do |vb|
    vb.gui = false
    vb.memory = conf['box_ram']
    vb.name = conf['project_machine_name'] + conf['drupal_core_version'] + "_" + conf['staging_env']
    vb.cpus = 2
  
    # Use VBoxManage to customize the VM. For example to change memory:
    vb.customize ["modifyvm", :id, "--cpuexecutioncap", "90", "--memory", conf['box_ram'], "--ioapic", "on"]
    vb.customize ["setextradata", :id, "VBoxInternal2/SharedFoldersEnableSymlinksCreate/SHARE_NAME", "1"]
  end

  # @see https://github.com/mitchellh/vagrant/issues/1172
  #config.vm.provision :shell, inline: "if [ ! $(grep single-request-reopen /etc/sysconfig/network) ]; then echo RES_OPTIONS=single-request-reopen >> /etc/sysconfig/network && service network restart; fi"

  # Enable provisioning with Ansible.
  config.vm.provision "ansible" do |ansible|
    ansible.playbook = "provisioning/playbook.yml"
    ansible.sudo = true
  end
  
end
