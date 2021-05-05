import yfinance as yf
import matplotlib.pyplot as plt
import seaborn
import time
import pandas as pd
from datetime import date
import sys

code = sys.argv[1]
# code = "AAPL"
stock = yf.Ticker(code)
history = stock.history(period="1y")
# history.info()
a = history['Close'].plot(figsize=(16, 9))
# history['Volume'].plot(figsize=(16, 9))


plt.title(code)
plt.ylabel("price")
plt.savefig(code+".png", dpi=70)
# plt.show()