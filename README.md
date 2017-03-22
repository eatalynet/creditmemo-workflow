# Creditmemo Workflow - Magento Module

## Overview

This module enables the usage of the creditmemo status giving the users the possibility to confirm a creditmemo that has been created in an "Open" status.

The purpose is to have an automatic process to generate the creditmemo (not provided by the module) and to have then someone that manually goes through them, refunds the customers offline and closes the creditmemos.

## Requirements

Magento EE >1.13 / CE >1.9.

## Installation

### Composer

In your `composer.json`, in the section `repositories`, add this repository:

    {
        "type": "vcs",
        "url": "git@github.com:eatalynet/creditmemo-workflow.git"
    }

Then open a terminal in the folder containing the `composer.json` and run:

    composer require eataly/creditmemo-workflow:1.0.0

### Modman

Go in your project root folder and run

    git submodule add git@github.com:eatalynet/creditmemo-workflow.git .modman/Eataly_CreditmemoWorkflow
    modman deploy Eataly_CreditmemoWorkflow

Clean the cache

### Manually

* Download latest version [here](https://github.com/eatalynet/creditmemo-workflow/archive/1.0.0.zip)
* Unzip in Magento root folder
* Clean the cache