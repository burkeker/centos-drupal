# -*- mode: ruby -*-
# vi: set ft=ruby :

require_relative 'vagrant.rb'
include MyVars

VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "chef/centos-6.5"

  config.vm.box_check_update = true
  config.vm.hostname = "d7.centos-" + STAGINGENV + ".local"

  #config.vm.network "forwarded_port", guest: 80, host: 8080

  config.vm.network "private_network", ip: "10.1.1.3"

  # If true, then any SSH connections made will enable agent forwarding.
  # Default value: false
  # config.ssh.forward_agent = true

  # Share an additional folder to the guest VM. The first argument is
  # the path on the host to the actual folder. The second argument is
  # the path on the guest to mount the folder. And the optional third
  # argument is a set of non-required options.
  # config.vm.synced_folder "../data", "/vagrant_data"

  config.vm.provider "virtualbox" do |vb|
    vb.gui = false
    vb.memory = 3072
    vb.name = "centos_drupal7_" + STAGINGENV
    vb.cpus = 2
  
    # Use VBoxManage to customize the VM. For example to change memory:
    # vb.customize ["modifyvm", :id, "--memory", "1024"]
  end

  # Enable provisioning with Ansible.
  config.vm.provision "ansible" do |ansible|
    ansible.playbook = "provisioning/playbook.yml"
    ansible.sudo = true
    ansible.extra_vars = {
      staging_env: STAGINGENV
    }
  end

end
