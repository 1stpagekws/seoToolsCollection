package main

import (
	"bufio"
	"path/filepath"
	"fmt"
	"os"
	"regexp"
	"strconv"
	"strings"
)

func main () {
	fmt.Println ("STTE: Program running...")
	fmt.Println ()

	// STEP 1: create info required by matt dimens
	var googleAPI string
	googleAPI = "id1"
	var searchEngineId string
	searchEngineId = "id2"
	var dailyLimit int
	dailyLimit = 1
	var prsentDay string
	prsentDay = "12340101"
	var prsentDayCount int
	prsentDayCount = 0

	// STEP 2: if there is a memorized preference, load it
	_y1 := fmt.Sprintf ("/stre/%s", filepath.Base(os.Args[0]))
	_y2, _y3 := os.ReadFile (_y1)
	
	if _y3 != nil {
		os.Create (_y1)
	} else {
		var storeCntentFormat *regexp.Regexp
		storeCntentFormat = regexp.MustCompile ("^[0-9a-zA-Z]+ [0-9a-zA-Z]+ [1-9][0-9]* " +
			"[0-9]{8,8}-(0|[1-9][0-9]*)$")
		if storeCntentFormat.Match (_y2) == true {
			_yM := strings.Split (string (_y2), " ")
			googleAPI = _yM [0]
			searchEngineId = _yM [1]
			_y4, _ := strconv.Atoi (_yM [2])
			dailyLimit = _y4
			_y5 := strings.Split (_yM [3], "-")
			prsentDay = _y5 [0]
			_y6, _ := strconv.Atoi (_y5 [1])
			prsentDayCount  = _y6
		}
	}

	// STEP 3: ask for details to run with
	fmt.Println ("PRMP:")
	for {
		fmt.Println ("------Last used Google API ID: " + googleAPI)
		fmt.Println ("------Should it be used? 'No' or 'Yes'?")

		_yX1, _ := bufio.NewReader (os.Stdin).ReadString ('\n')
		_yX2 := strings.Replace (_yX1, "\n", "", -1)

		if strings.ToLower (_yX2) != "no" && strings.ToLower (_yX2) != "yes" {
			fmt.Println ("------Invalid input. Enter 'no' or 'yes' (without the quotes)")
			fmt.Println ("")
			continue
		} else if strings.ToLower (_yX2) == "no" {
			fmt.Println ("")
				
			for {
				fmt.Println ("------Enter ID to use:")

				_y7, _ := bufio.NewReader (os.Stdin).ReadString ('\n')
				_y8 := strings.Replace (_y7, "\n", "", -1)

				var frm1 *regexp.Regexp
				frm1 = regexp.MustCompile ("^[0-9a-zA-Z]+$")
				if frm1.MatchString (_y8) == false {
					fmt.Println ("------" + "Invalid ID. Try again.")
					fmt.Println ("")
					continue
				}

				googleAPI = _y8
				fmt.Println ("")
				break
			}
		} else {
			fmt.Println ("------Ok!")
			fmt.Println ("")
		}

		break
	}

	for {
		fmt.Println ("------Last used Search Engine ID: " + searchEngineId)
		fmt.Println ("------Should it be used? 'No' or 'Yes'?")

		_yY1, _ := bufio.NewReader (os.Stdin).ReadString ('\n')
		_yY2 := strings.Replace (_yY1, "\n", "", -1)

		if strings.ToLower (_yY2) != "no" && strings.ToLower (_yY2) != "yes" {
			fmt.Println ("------Invalid input. Enter 'no' or 'yes' (without the quotes)")
			fmt.Println ("")
			continue
		} else if strings.ToLower (_yY2) == "no" {
			fmt.Println ("")

			for {
				fmt.Println ("------Enter the ID of the search engine to use:")

				_y9, _ := bufio.NewReader (os.Stdin).ReadString ('\n')
				_y10 := strings.Replace (_y9, "\n", "", -1)

				var frm2 *regexp.Regexp
				frm2 = regexp.MustCompile ("^[0-9a-zA-Z]+$")
				if frm2.MatchString (_y10) == false {
					fmt.Println ("------" + "Invalid ID. Try again.")
					fmt.Println ("")
					continue
				}

				searchEngineId = _y10
				fmt.Println ("")
				break
			}
		} else {
			fmt.Println ("------Ok!")
			fmt.Println ("")
		}

		break
	}

	for {
		fmt.Println ("------Last used Daily Limit: " + strconv.Itoa (dailyLimit))
		fmt.Println ("------Should it be used? 'No' or 'Yes'?")

		_yZ1, _ := bufio.NewReader (os.Stdin).ReadString ('\n')
		_yZ2 := strings.Replace (_yZ1, "\n", "", -1)

		if strings.ToLower (_yZ2) != "no" && strings.ToLower (_yZ2) != "yes" {
			fmt.Println ("------Invalid input. Enter 'no' or 'yes' (without the quotes)")
			fmt.Println ("")
			continue
		} else if strings.ToLower (_yZ2) == "no" {
			fmt.Println ("")

			for {
				fmt.Println ("------Enter Daily Limit to use:")

				_y17, _ := bufio.NewReader (os.Stdin).ReadString ('\n')
				_y18 := strings.Replace (_y17, "\n", "", -1)

				var frm3 *regexp.Regexp
				frm3 = regexp.MustCompile ("^[1-9][0-9]*$")
				if frm3.MatchString (_y18) == false {
					fmt.Println ("------" + "Invalid ID. Try again.")
					fmt.Println ()
					continue
				}

				_y19, _ := strconv.Atoi (_y18)
				dailyLimit = _y19
				fmt.Println ("")
				break
			}
		} else {
			fmt.Println ("------Ok!")
			fmt.Println ("")
		}

		break
	}

	// STEP 4: Memorize preference
	os.WriteFile (_y1, []byte (fmt.Sprintf ("%s %s %d %s-%d",
		googleAPI,
		searchEngineId,
		dailyLimit,
		prsentDay,
		prsentDayCount)), 0666)

	// STEP 5: startup the matt dimens
	fmt.Println (googleAPI)
	fmt.Println (searchEngineId)
	fmt.Println (dailyLimit)
	fmt.Println (prsentDay)
	fmt.Println (prsentDayCount)
}

func srvc_krsr (clap chan<- []string, flap chan<- []string) {}

//|| intr:kRsrHTTP
func intr_krsrHTTP (clap chan<- []string, flap chan<- []string) {}
