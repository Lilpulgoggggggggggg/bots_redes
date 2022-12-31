import os
os.system('pip install requests undetected_chromedriver webdriver_manager selenium')
os.system('clear')
os.system('cls')
from time import sleep
import sys
sys.path.append(r'./')
from init import *
from selenium.webdriver.common.action_chains import ActionChains
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.support.ui import WebDriverWait

username = input('What is your username?\n')

class Instagram:

    def setup(self):
        Setup.init(self)

    def go_to_website(self):
        sleep(4)
        self.browser.get('https://tolinay.com/instagram-takipci-hilesi')
        sleep(4)

        N = 6

        actions = ActionChains(self.browser)
        for _ in range(N):
            actions = actions.send_keys(Keys.TAB)
        actions.perform()
        sleep(2)

        actions.send_keys(username)
        actions.perform()
        sleep(4)

        actions = actions.send_keys(Keys.TAB)
        actions.perform()
        sleep(2)

        actions.send_keys(Keys.RETURN)
        actions.perform()
        sleep(850)

    def close_browser(self):
        Setup.close_browser(self)

ig = Instagram()
ig.setup()

while(True):
    ig.go_to_website()
ig.close_browser()
