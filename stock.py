import yfinance as yf
import matplotlib.pyplot as plt
import seaborn
import time
import pandas as pd
from datetime import date
import sys



code = sys.argv[1]
# code = code + ".tw"
# code = "BA"

stock = yf.Ticker(code)
history = stock.history(period="1d", start=date.today(), end=date.today())
print("%.2f" % float(history.Close))
# print(history)