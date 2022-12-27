import os
os.system('pip install requests undetected_chromedriver webdriver_manager selenium')
os.system('clear')
os.system('cls')
from selenium.common.exceptions import WebDriverException
from selenium.webdriver.support.wait import WebDriverWait
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.common.by import By 
from selenium.webdriver.support import expected_conditions as EC 
from selenium.webdriver.common.action_chains import ActionChains 
import time
import random
from webdriver_manager.chrome import ChromeDriverManager
import undetected_chromedriver as uc
import requests





info = {}

print("loading...")
time.sleep(3)
os.system('cls')
views = int(input("enter no. of like: "))
time.sleep(0)
os.system('cls')
username = (input("enter username on instagram: "))
time.sleep(0)
os.system('cls')
print("loading...")
time.sleep(3)
os.system('cls')







for i in range(views):
        chrome_options = uc.ChromeOptions()
        chrome_options.add_argument('--headless')
        driver = uc.Chrome(options=chrome_options)
        driver.get("https://freezlike.co/instagram?free-trial=540-free-instagram-likes")
        print("your page is loading your link please wait...")
        time.sleep(4)
        os.system('cls')
        enter_username = WebDriverWait(driver,20).until(EC.presence_of_element_located((By.NAME, 'username')))
        enter_username.send_keys(username + '\n')
        print("your link is successful put...")
        time.sleep(4)
        os.system('cls')
        print("thanks your instagram link is successful loading...")
        time.sleep(4)
        os.system('cls')
        print("Your site is on status load please wait for the likes successful...")
        time.sleep(4)
        os.system('cls')
        print("Your like is successful sent...")
        time.sleep(4)
        os.system('cls')
        print("reloading page...")
        time.sleep(4)
        os.system('cls')
        driver.quit()